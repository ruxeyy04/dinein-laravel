<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Food;
use App\Models\User;
use App\Models\Table;
use App\Models\FoodReserve;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }
    // Customer
    public function custIndex()
    {
        return view('index');
    }
    public function custAbout()
    {
        return view('about');
    }
    public function custlproducts()
    {
        return view('lproducts');
    }
    public function custOrder()
    {
        return view('order');
    }
    public function custProf()
    {
        return view('prof');
    }
    public function custReserve()
    {
        return view('reserve');
    }
    public function custTable()
    {
        return view('table');
    }
    // ==================

    // Incharge Page
    public function inchIndex()
    {
        return view('incharge.index');
    }
    public function inchFoods()
    {
        return view('incharge.foods');
    }
    public function inchProfile()
    {
        return view('incharge.profile');
    }
    public function inchReservation()
    {
        return view('incharge.reservation');
    }
    public function inchTable()
    {
        return view('incharge.table');
    }
    // ==================

    // Admin Page
    public function adminIndex()
    {
        return view('admin.index');
    }
    public function adminFoods()
    {
        return view('admin.foods');
    }
    public function adminProfile()
    {
        return view('admin.profile');
    }
    public function adminTable()
    {
        return view('admin.table');
    }
    public function adminUsers()
    {
        return view('admin.users');
    }
    // =================

    // API Routes
    public function add_food(Request $request)
    {
        $response = ['success' => false];

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        if ($image->isValid()) {
            $imageName = $image->getClientOriginalName();
            $imagePath = 'img/food/' . $imageName;

            // Move the uploaded image to the desired directory
            $image->move(public_path('img/food'), $imageName);
        } else {
            // If no image is uploaded, use a default image
            $imageName = 'default.png';
        }

        // Save the data to the database using Eloquent
        Food::create([
            'foodname' => $name,
            'desc' => $description,
            'price' => $price,
            'image' => $imageName,
        ]);

        $response['success'] = true;

        return response()->json($response);
    }
    public function add_table(Request $request)
    {
        $response = ['success' => false];

        $request->validate([
            'capacity' => 'required|integer',
            'location' => 'required|string',
            'status' => 'required|string',
        ]);

        $capacity = $request->input('capacity');
        $location = $request->input('location');
        $status = $request->input('status');

        // Save the data to the database using Eloquent
        Table::create([
            'capacity' => $capacity,
            'location' => $location,
            'status' => $status,
        ]);

        $response['success'] = true;

        return response()->json($response);
    }
    public function add_user(Request $request)
    {
        $response = ['success' => false];

        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'usertype' => 'required|string',
        ]);

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $address = $request->input('address');
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $usertype = $request->input('usertype');

        // Save the data to the database using Eloquent
        User::create([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'address' => $address,
            'username' => $username,
            'password' => $password,
            'usertype' => $usertype,
        ]);

        $response['success'] = true;

        return response()->json($response);
    }
    public function check_password(Request $request)
    {
        $response = ['status' => 'error', 'message' => 'Invalid request'];

        if ($request->isMethod('post')) {
            $request->validate([
                'userid' => 'required|numeric',
                'oldpass' => 'required|string',
                'newpass' => 'required|string|min:6',
                'confirmpass' => 'required|string|same:newpass',
            ]);

            $userid = $request->input('userid');
            $oldPassword = $request->input('oldpass');
            $newPassword = $request->input('newpass');

            // Find the user by ID
            $user = User::find($userid);

            if ($user) {
                // Check if the old password matches the current password
                if (Hash::check($oldPassword, $user->password)) {
                    // Update the password
                    $user->password = Hash::make($newPassword);
                    $user->save();

                    $response['status'] = 'success';
                    $response['message'] = 'Password changed successfully';
                } else {
                    $response['message'] = 'Invalid old password';
                }
            } else {
                $response['message'] = 'User not found';
            }
        }

        return response()->json($response);
    }
    public function delete_food(Request $request)
    {
        $response = ['success' => false];

        if ($request->isMethod('post')) {
            $request->validate([
                'food_id' => 'required|numeric',
            ]);

            $food_id = $request->input('food_id');

            // Check if there are reservations for the food
            $hasReservations = FoodReserve::where('food_id', $food_id)->exists();

            if ($hasReservations) {
                $response['invalid'] = true;
            } else {
                // Delete the food
                $food = Food::find($food_id);

                if ($food) {
                    $food->delete();
                    $response['success'] = true;
                } else {
                    $response['message'] = 'Food not found';
                }
            }
        }

        return response()->json($response);
    }
    public function delete_table(Request $request)
    {
        $response = ['success' => false];

        if ($request->isMethod('post')) {
            $request->validate([
                'table_no' => 'required|numeric',
            ]);

            $table_no = $request->input('table_no');

            // Check if there are reservations for the table
            $hasReservations = Reservation::where('table_no', $table_no)->exists();

            if ($hasReservations) {
                $response['invalid'] = true;
            } else {
                // Delete the table
                $table = Table::find($table_no);

                if ($table) {
                    $table->delete();
                    $response['success'] = true;
                } else {
                    $response['message'] = 'Table not found';
                }
            }
        }

        return response()->json($response);
    }
    public function grab_res()
    {
        $tables = [];

        $reservations = Reservation::select('reservation.*', 'user.fname', 'user.lname')
            ->join('user', 'reservation.userid', '=', 'user.userid')
            ->orderByDesc('reservation.status')
            ->get();

        if ($reservations->count() > 0) {
            $tables = $reservations->toArray();
        } else {
            $tables['empty'] = true;
        }

        return response()->json($tables);
    }
    public function grab_table()
    {
        $tables = [];

        $tablesData = Table::orderBy('status', 'ASC')->get();

        if ($tablesData->count() > 0) {
            $tables = $tablesData->toArray();
        } else {
            $tables['empty'] = true;
        }

        return response()->json($tables);
    }
    public function grabcount()
    {
        $response = [];

        $response['total_food'] = Food::count();
        $response['total_table'] = Table::count();
        $response['total_user'] = User::count();
        $response['total_incharge'] = User::where('usertype', 'Incharge')->count();
        $response['totalReservation'] = Reservation::count();

        return response()->json($response);
    }
    public function grabfood(Request $request)
    {
        $food_id = $request->input('food_id');

        $food = Food::find($food_id);

        if ($food) {
            return response()->json([$food]);
        } else {
            return response()->json([]);
        }
    }
    public function grabfoods()
    {
        $foods = Food::all();

        if ($foods->isEmpty()) {
            return response()->json(['empty' => true]);
        } else {
            return response()->json($foods);
        }
    }
    public function grabreservations()
    {
        $reservations = Reservation::all();

        if ($reservations->isEmpty()) {
            return response()->json(['empty' => true]);
        } else {
            return response()->json($reservations);
        }
    }
    public function grabusers(Request $request)
{
    if ($request->has('profile')) {
        $userid = $request->input('userid');
        $users = User::where('userid', $userid)->get();
    } else {
        $users = User::all();
    }

    // Loop through each user and set the password field to '**********'
    foreach ($users as $user) {
        $user->password = '**********';
    }

    if ($users->isEmpty()) {
        return response()->json(['empty' => true]);
    } else {
        return response()->json($users);
    }
}

    public function loginapi(Request $request)
    {
        if ($request->has('register')) {
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $add = $request->input('address');
            $user = $request->input('uname');
            $pass = $request->input('pass');
            $email = $request->input('email');

            $result = User::create([
                'fname' => $fname,
                'lname' => $lname,
                'username' => $user,
                'email' => $email,
                'address' => $add,
                'password' => Hash::make($pass),
            ]);

            if ($result) {
                return response()->json(['status' => 'Success', 'message' => 'Registered Successfully']);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'Register Failed']);
            }
        } else if ($request->has('login')) {
            $user = $request->input('email');
            $pass = $request->input('pass');

            $result = User::where(function ($query) use ($user) {
                $query->where('username', $user)->orWhere('email', $user);
            })->first();

            if ($result && Hash::check($pass, $result->password)) {
                $userId = $result->userid;
                $userType = $result->usertype;
                return response()->json(['status' => 'success', 'message' => 'Login Successful', 'userid' => $userId, 'usertype' => $userType]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Invalid username or password']);
            }
        }
    }
    public function products(Request $request)
    {
        if ($request->isMethod('get')) {
            $result = Food::all();

            if ($result->count() > 0) {
                return response()->json(['food' => $result]);
            } else {
                return response()->json(['food' => []]);
            }
        }
        if ($request->isMethod('post')) {
            if ($request->has('searchProd')) {
                $value = $request->input('searchProd');
                $result = Food::where('foodname', 'LIKE', "%$value%")->get();

                if ($result->count() > 0) {
                    return response()->json(['food' => $result]);
                } else {
                    return response()->json(['food' => []]);
                }
            } else if ($request->has('getFoodInfo')) {
                $prodid = $request->input('getFoodInfo');
                $result = Food::where('food_id', $prodid)->first();

                if ($result) {
                    return response()->json($result);
                } else {
                    return response()->json([]);
                }
            }
        }
    }
    public function getReservation(Request $request)
    {
        if ($request->isMethod('get') && $request->has('getReservation')) {
            $userid = $request->input('getReservation');
            $result = Reservation::selectRaw('a.*, SUM(b.quantity) AS totalItem, SUM(b.quantity * c.price) AS totalAmount')
                ->from('reservation as a')
                ->join('foodreserve as b', 'a.resno', '=', 'b.resno')
                ->join('food as c', 'b.food_id', '=', 'c.food_id')
                ->where('a.userid', $userid)
                ->groupBy('a.resno')
                ->get();

            if ($result->count() > 0) {
                return response()->json(['res' => $result]);
            } else {
                return response()->json(['res' => []]);
            }
        }

        if ($request->isMethod('post') && $request->has('getResrvation')) {
            $resno = $request->input('getResrvation');
            $result1 = Reservation::selectRaw('a.*, a.status as statusReserve, SUM(b.quantity) AS totalItem, SUM(b.quantity * c.price) AS totalAmount')
                ->from('reservation as a')
                ->join('foodreserve as b', 'a.resno', '=', 'b.resno')
                ->join('food as c', 'b.food_id', '=', 'c.food_id')
                ->where('a.resno', $resno)
                ->groupBy('a.resno')
                ->first();

            $result = FoodReserve::selectRaw('a.*, b.*, (a.quantity * b.price) as totalPrice')
                ->from('foodreserve as a')
                ->join('food as b', 'a.food_id', '=', 'b.food_id')
                ->where('a.resno', $resno)
                ->get();

            if ($result->count() > 0) {
                $items['item'] = $result->toArray();
                $items['statusReserve'] = $result1->statusReserve;
                $items['table_no'] = $result1->table_no;
                $items['totalAmount'] = $result1->totalAmount;
                return response()->json($items);
            } else {
                return response()->json(['item' => []]);
            }
        }

        if ($request->isMethod('post') && $request->has('cancelOrder')) {
            $resno = $request->input('cancelOrder');

            // Check if the reservation is already approved
            $checkResult = Reservation::where('resno', $resno)->where('status', 'Approved')->exists();

            if ($checkResult) {
                return response()->json(['status' => 'error', 'message' => 'The reservation is already approved and cannot be cancelled.']);
            } else {
                // Update the reservation status to "Cancelled"
                $cancelResult = Reservation::where('resno', $resno)->update(['status' => 'Cancelled']);

                if ($cancelResult) {
                    return response()->json(['status' => 'success', 'message' => 'The reservation has been successfully cancelled.']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Failed to cancel the reservation.']);
                }
            }
        }
    }
    public function reserve(Request $request)
    {
        if ($request->isMethod('post') && $request->has('getFoodOrder')) {
            $userid = $request->input('getFoodOrder');
            $sql = "SELECT a.*, b.*, (a.quantity * b.price) as totalPrice FROM foodreserve a INNER JOIN food b ON a.food_id=b.food_id WHERE a.userid = $userid AND a.status = 'Cart'";
            $sql1 = "SELECT SUM(a.quantity * b.price) as totalAmount FROM foodreserve a INNER JOIN food b ON a.food_id=b.food_id WHERE a.userid = $userid AND a.status = 'Cart'";
            $result = DB::select($sql);
            $res = DB::select($sql1);
            $rowww = $res[0];

            if ($result) {
                if (count($result) > 0) {
                    $food['food'] = $result;
                    $food['totalAmount'] = $rowww->totalAmount;
                    return response()->json($food);
                } else {
                    return response()->json(['food' => []]);
                }
            } else {
                return response()->json(['food' => []]);
            }
        }

        if ($request->isMethod('post') && $request->has('reserveOrder')) {
            $foodid = $request->input('reserveOrder');
            $userid = $request->input('userid');

            $checkResult = FoodReserve::where('food_id', $foodid)->where('userid', $userid)->where('status', '!=', 'Ordered')->exists();

            if ($checkResult) {
                return response()->json(['status' => 'error', 'message' => 'Food is already reserved']);
            } else {
                $res = FoodReserve::create(['food_id' => $foodid, 'userid' => $userid]);

                if ($res) {
                    return response()->json(['status' => 'success', 'message' => 'Added to Reserve Order']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Failed to Reserve Order']);
                }
            }
        }
        if ($request->isMethod('post') && $request->has('updateQuantity')) {
            $cartid = $request->input('updateQuantity');
            $quant = $request->input('quant');
            $sql = "UPDATE foodreserve SET quantity = $quant WHERE resfoodid = $cartid";

            $result = DB::update($sql);

            if ($result) {
                return response()->json(['status' => 'success', 'message' => 'Update quantity']);
            }
        }
        if ($request->isMethod('post') && $request->has('deleteReserveFood')) {
            $cartid = $request->input('deleteReserveFood');
            $sql = "DELETE FROM foodreserve WHERE resfoodid = $cartid";

            $result = DB::delete($sql);

            if ($result) {
                return response()->json(['status' => 'success', 'message' => 'Delete reserve food']);
            } else {
                return response()->json(['status' => 'empty']);
            }
        }
        if ($request->isMethod('post') && $request->has('finalReserve')) {
            $table = $request->input('finalReserve');
            $sched = $request->input('sched');
            $userid = $request->input('userid');

            if (empty($sched) || is_null($sched) || empty($table) || is_null($table)) {
                return response()->json(['status' => 'error', 'message' => 'Invalid table or schedule']);
            }

            $selectedDateTime = new DateTime($sched);
            $startTime = new DateTime($selectedDateTime->format('Y-m-d') . ' 09:00:00');
            $endTime = new DateTime($selectedDateTime->format('Y-m-d') . ' 20:00:00');

            if ($selectedDateTime < $startTime || $selectedDateTime > $endTime) {
                return response()->json(['status' => 'error', 'message' => 'Invalid schedule. The store is open from 9:00 AM to 8:00 PM.']);
            }

            $checkResult = Reservation::where('datetimesched', $sched)->exists();

            if ($checkResult) {
                return response()->json(['status' => 'error', 'message' => 'There is already a reservation on the selected date']);
            }

            $insertResult = Reservation::create(['table_no' => $table, 'userid' => $userid, 'datetimesched' => $sched, 'status' => 'Pending']);

            if ($insertResult) {
                $resno = $insertResult->resno;

                $updateResult = FoodReserve::where('userid', $userid)->where('status', 'Cart')->update(['resno' => $resno, 'status' => 'Ordered']);

                if ($updateResult) {
                    return response()->json(['status' => 'success', 'message' => 'Reservation successful']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Failed to update foodreserve table']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Failed to insert into reservation table']);
            }
        }
    }
    public function table(Request $request)
    {
        if ($request->isMethod('get')) {
            $tables = Table::all();

            if ($tables->count() > 0) {
                $prod = [];

                foreach ($tables as $table) {
                    $occupied = false;
                    $remaining_time = "Not Occupied";

                    $reservations = Reservation::where('table_no', $table->table_no)->where('status', 'Approved')->get();

                    if ($reservations->count() > 0) {
                        $reservation = $reservations->first();
                        $status = $reservation->status;

                        if ($status === 'Approved') {
                            $datetimeScheduled = strtotime($reservation->datetimesched);
                            $currentDatetime = time(); // Get the current UNIX timestamp
                            $endDatetime = strtotime(date('Y-m-d', $datetimeScheduled) . ' 12:00:00'); // Set the end time of the reservation to 12 PM on the scheduled date

                            if ($currentDatetime >= $datetimeScheduled && $currentDatetime <= $endDatetime) {
                                $occupied = true;
                                $remaining_time = "Occupied";
                            } elseif ($currentDatetime < $datetimeScheduled) {
                                $timeDiff = $datetimeScheduled - $currentDatetime;
                                $hours = floor($timeDiff / (60 * 60));
                                $minutes = floor(($timeDiff - ($hours * 60 * 60)) / 60);
                                $remaining_time = $hours . " hrs " . $minutes . " mins";
                            }
                        }
                    }

                    $prod['table'][] = [
                        'table_no' => $table->table_no,
                        'capacity' => $table->capacity,
                        'location' => $table->location,
                        'status' => $table->status,
                        'statusReserved' => $occupied ? 'Occupied' : 'Not Occupied',
                        'remaining_time' => $remaining_time
                    ];
                }

                return response()->json($prod);
            }
        }
    }
    public function updateFood(Request $request)
    {
        $food_id = $request->input('food_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $hasImage = $request->hasFile('image');

        $food = Food::find($food_id);

        if ($food) {
            if ($hasImage) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $imagePath = 'img/food/';
                $image->move($imagePath, $imageName);

                $food->image = $imageName;
            }

            $food->foodname = $name;
            $food->desc = $description;
            $food->price = $price;
            $food->save();

            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = 'Food not found';
        }

        return response()->json($response);
    }
    public function updateStatus(Request $request)
    {
        $status = $request->input('status');
        $resno = $request->input('resno');

        $reservation = Reservation::find($resno);

        if ($reservation) {
            $reservation->status = $status;
            $reservation->save();

            $response['status'] = 'success';
            $response['message'] = 'Status Updated';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Reservation not found';
        }

        return response()->json($response);
    }
    public function update_table(Request $request)
    {
        $table_no = $request->input('table_no');
        $capacity = $request->input('capacity');
        $location = $request->input('location');
        $status = $request->input('status');

        $table = Table::find($table_no);

        if ($table) {
            $table->capacity = $capacity;
            $table->location = $location;
            $table->status = $status;
            $table->save();

            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = 'Table not found';
        }

        return response()->json($response);
    }
    public function update_user(Request $request)
    {
        $userid = $request->input('userid');
        $username = $request->input('username');
        $password = $request->input('password');
        $usertype = $request->input('usertype');

        $user = User::find($userid);

        if ($user) {
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->usertype = $usertype;

            // Check if additional fields are provided
            if ($request->has('fname')) {
                $fname = $request->input('fname');
                $lname = $request->input('lname');
                $email = $request->input('email');
                $address = $request->input('address');

                $user->fname = $fname;
                $user->lname = $lname;
                $user->email = $email;
                $user->address = $address;
            }

            $user->save();

            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = 'User not found';
        }

        return response()->json($response);
    }
    public function userinfo(Request $request)
    {
        if ($request->has('userid')) {
            $userid = $request->input('userid');

            $user = User::find($userid);

            if ($user) {
                return response()->json($user);
            } else {
                return response()->json(['status' => 'error', 'message' => 'User not found']);
            }
        }
        if ($request->has('editProd')) {
            $userid = $request->input('editProd');
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $email = $request->input('email');
            $username = $request->input('username');
            $address = $request->input('address');

            $user = User::find($userid);

            if ($user) {
                $user->fname = $fname;
                $user->lname = $lname;
                $user->email = $email;
                $user->username = $username;
                $user->address = $address;

                $user->save();

                return response()->json(['status' => 'success', 'message' => 'Profile Updated Successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'User not found']);
            }
        }
    }
}
