<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('food_id');
            $table->string('foodname', 50);
            $table->text('desc');
            $table->decimal('price', 10, 2);
            $table->text('image');
            $table->timestamps();
        });

        DB::table('food')->insert([
            [
                'food_id' => 1, 
                'foodname' => 'Grilled Beef Steak', 
                'desc' => 'Grilled beef steak is a succulent and flavorful dish that showcases the natural richness of beef. It typically involves a thick cut of high-quality beef, such as ribeye, sirloin, or filet mignon, which is seasoned with salt, pepper, and sometimes other spices or marinades to enhance the taste.', 
                'price' => 325.00,
                'image' => 'grilledbeefsteaks.jpg'
            ],
            [
                'food_id' => 2, 
                'foodname' => 'Garlic Butter Shrimp', 
                'desc' => 'Garlic butter shrimp is a mouthwatering seafood dish that features succulent shrimp cooked in a flavorful combination of garlic and butter. It is a popular dish enjoyed in various cuisines around the world, particularly in Mediterranean and Cajun cooking.  To prepare garlic butter shrimp, fresh or thawed shrimp are typically cleaned and deveined before cooking. The shrimp are then sautéed or pan-fried in a mixture of melted butter and minced garlic. The garlic infuses the butter, releasing its aromatic flavors and creating a delicious base for the shrimp. The butter adds richness and helps to enhance the natural sweetness of the shrimp.', 
                'price' => 220.00,
                'image' => 'garlicbuttershrimp.jpg'
            ],
            [
                'food_id' => 3, 
                'foodname' => 'Creamy Carbonara', 
                'desc' => 'Creamy Carbonara is a classic Italian pasta dish that is known for its rich, velvety sauce and savory flavors. It typically consists of spaghetti or fettuccine noodles tossed in a sauce made with eggs, cheese, pancetta or bacon, and black pepper.  To prepare Creamy Carbonara, the pasta is cooked until al dente, then drained and set aside. Meanwhile, pancetta or bacon is sautéed until crispy, rendering its fat and infusing the dish with a smoky and salty flavor. In a separate bowl, eggs and grated cheese, such as Parmesan or Pecorino Romano, are whisked together until well combined.  The cooked pasta is then added to the pan with the pancetta or bacon, and the heat is reduced to low. The egg and cheese mixture is poured over the pasta, and the ingredients are quickly tossed together. The residual heat from the pasta cooks the eggs, creating a luscious and creamy sauce that coats the noodles.', 
                'price' => 175.00,
                'image' => 'creamycarbonara.jpg'
            ],
            [
                'food_id' => 4, 
                'foodname' => 'Roast Chicken', 
                'desc' => 'Roast chicken is a classic and beloved food product that consists of a whole chicken that has been seasoned and cooked until golden brown and tender. It is a versatile dish that is popular in many cuisines around the world and is often enjoyed as a centerpiece for a hearty meal.  The preparation of roast chicken typically involves cleaning and seasoning the chicken, both on the outside and inside the cavity. Common seasonings include salt, pepper, garlic, herbs (such as thyme, rosemary, or sage), and sometimes a touch of lemon or other citrus flavors. The chicken is then roasted in the oven, allowing the heat to penetrate the meat and create a crispy skin while keeping the inside juicy and flavorful.  As the chicken roasts, it develops a delicious aroma that fills the kitchen and entices the senses. The skin turns golden and crispy, providing a satisfying crunch with each bite. The meat becomes tender, succulent, and infused with the flavors of the seasonings. The combination of the juicy meat and crispy skin creates a delightful contrast in texture.', 
                'price' => 275.00,
                'image' => 'roastchicken.jpg'
            ],
            [
                'food_id' => 5, 
                'foodname' => 'Beef Wellington', 
                'desc' => 'Beef Wellington is a classic and elegant dish that consists of a tender beef fillet coated with pâté, duxelles (a mixture of finely chopped mushrooms, onions, and herbs), and wrapped in puff pastry. It is then baked to perfection, resulting in a golden and flaky crust surrounding a juicy and flavorful beef center.  The preparation of Beef Wellington typically begins with searing the beef fillet to seal in the juices and enhance the flavor. The fillet is then coated with a layer of pâté, which acts as a barrier between the beef and the puff pastry, keeping the pastry crisp and preventing it from becoming soggy. The pâté also adds a rich and indulgent element to the dish.  Next, a layer of duxelles is spread over the pâté. The duxelles mixture is made by finely chopping mushrooms, onions, and herbs, then cooking them down until they become a flavorful paste. The duxelles adds earthy and savory notes to the dish, complementing the beef and adding moisture to the filling.  Once the beef fillet is coated with pâté and duxelles, it is carefully wrapped in a sheet of puff pastry. Puff pastry is a light and flaky pastry made by layering butter between thin sheets of dough, which, when baked, puffs up and creates a crispy and golden crust.', 
                'price' => 1950.00,
                'image' => 'beefwellington.jpg'
            ],
            [
                'food_id' => 6, 
                'foodname' => 'Baked Salmon', 
                'desc' => 'Baked salmon is a popular and healthy food product that features salmon fillets cooked in the oven until tender and flavorful. Salmon is a nutritious fish known for its rich flavor and high content of omega-3 fatty acids, which are beneficial for heart health.  To prepare baked salmon, fresh salmon fillets are typically seasoned with a variety of herbs and spices to enhance the taste. Common seasonings include salt, pepper, garlic, lemon juice, dill, and olive oil. These seasonings add depth and complement the natural flavors of the salmon.  The salmon fillets are then placed on a baking sheet or in a baking dish and cooked in a preheated oven. The baking time can vary depending on the thickness of the fillets, but it generally takes around 12-15 minutes at 375°F (190°C) for medium-rare to medium doneness. The salmon should be opaque and flake easily with a fork when done.', 
                'price' => 325.00,
                'image' => 'bakedsalmon.jpg'
            ],
            [
                'food_id' => 7, 
                'foodname' => 'Yakisoba', 
                'desc' => 'Yakisoba is a popular Japanese stir-fried noodle dish that is enjoyed throughout Japan and has gained popularity in many other parts of the world. The name "yakisoba" literally translates to "grilled noodles," although the noodles used in this dish are actually boiled rather than grilled.  The main component of yakisoba is wheat noodles, typically made from wheat flour, water, and sometimes eggs. These noodles are cooked until they are al dente, then they are drained and set aside. The noodles used for yakisoba are thicker and chewier compared to other Asian noodles like ramen or udon.  The dish also incorporates a variety of ingredients such as thinly sliced pork, cabbage, carrots, onions, and sometimes other vegetables like bell peppers or bean sprouts. These ingredients are typically stir-fried together in a pan or wok with a little bit of oil. The pork is cooked until it\'s tender, and the vegetables are cooked until they\'re slightly softened but still retain some crunch.', 
                'price' => 275.00,
                'image' => 'yakisoba.jpg'
            ],
            [
                'food_id' => 8, 
                'foodname' => 'Black Pepper Chicken', 
                'desc' => 'Black Pepper Chicken is a savory and flavorful food product that features tender pieces of chicken coated in a rich black pepper sauce. It is a popular dish in many cuisines, particularly in Asian and Western cooking.  The chicken used in Black Pepper Chicken is typically boneless and skinless, ensuring a tender and juicy texture. The meat is often marinated beforehand to enhance its flavor and tenderness. The marinade can vary but commonly includes ingredients like soy sauce, garlic, ginger, and sometimes a touch of sweetness like honey or brown sugar.  The star of this dish is the black pepper sauce. It is made by combining black pepper, soy sauce, oyster sauce, and other seasonings such as garlic and onion. The black pepper provides a robust and slightly spicy flavor, while the other ingredients add depth and umami notes to the sauce. The sauce is usually thickened to coat the chicken pieces and create a glossy finish.', 
                'price' => 295.00,
                'image' => 'blackpepperchicken.jpg'
            ],
            [
                'food_id' => 9, 
                'foodname' => 'Lemon Garlic Butter Scallops', 
                'desc' => 'Lemon Garlic Butter Scallops are a delectable seafood dish that combines the delicate and sweet flavor of scallops with the tanginess of lemon, the richness of garlic, and the luxuriousness of butter. These succulent scallops are seared to perfection, creating a beautiful golden-brown crust while keeping the inside tender and juicy.  The dish typically starts with high-quality, fresh scallops, which are usually sourced from the sea. The scallops are patted dry to ensure a proper sear and seasoned with salt and pepper. In a hot skillet, butter is melted until it starts to sizzle, and then minced garlic is added, infusing the butter with its aromatic flavors. The scallops are carefully placed in the skillet, allowing them to cook undisturbed for a few minutes on each side until they develop a caramelized crust.  As the scallops cook, freshly squeezed lemon juice is drizzled over them, imparting a bright and zesty flavor that complements the natural sweetness of the seafood. The lemon juice also helps balance the richness of the butter, adding a refreshing element to the dish.', 
                'price' => 379.00,
                'image' => 'lemongarlicbutterscallops.jpg'
            ],
            [
                'food_id' => 10, 
                'foodname' => 'Cajun Honey Pork Tenderloin', 
                'desc' => 'Cajun Honey Pork Tenderloin is a delectable food product that combines the bold and spicy flavors of Cajun cuisine with a touch of sweetness from honey. It features tender and succulent pork tenderloin that has been seasoned with a blend of Cajun spices, creating a flavorful and aromatic profile.  The Cajun seasoning typically includes a combination of ingredients such as paprika, cayenne pepper, garlic powder, onion powder, thyme, oregano, and other spices. This blend infuses the pork tenderloin with a rich and robust taste, complemented by the smoky undertones of the paprika and the heat from the cayenne pepper.  To balance out the spiciness, honey is used to add a touch of sweetness to the dish. The honey glaze is usually brushed over the pork tenderloin during the cooking process, creating a caramelized coating that enhances both the flavor and appearance of the meat.', 
                'price' => 167.00,
                'image' => 'cajunhoneyporktenderloin.jpg'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
