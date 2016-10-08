<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
                'status' => 'Online',
                'office_status' => 'Live',
                'availability' => 'Available',
                'slug' => 'graciebee',
                'ispromo' => 0,
                'is_published' => 1,
                'name' => 'GracieBee',
                'subtitle' => 'traditional-style quilting',
                'manufacturer' => 'The Grace Company',
                'details' => 'The GracieBee traditional-style quilting frame has many non-traditional innovations. Leg joints easily slide together for a snug, sturdy, and balanced fit. Each leg rests on two separate feet, eliminating wobble. All parts fit together without the need for any extra tools to create a uniquely functional group quilting frame. When not in use, all of the pieces come together compactly for convenient storage or travel.',
                'description' => '<h2>Gracie Bee Quilting for all of your Creative Needs</h2>
<p>For those of us who love making quilts, from small scale to industrial sizes, Gracie Bee is your one stop shop solution for any and all of your quilting needs. Their diverse selection of quilting tools and accessories, ranging from classic quilting frames to their high-tech Quilter\'s Creative Touch software, allow you the most comfortable and simplistic online shopping experience imaginable.</p>
<p>Let\'s say that you are in the market for a new machine quilting frame, Gracie Bee provides a selection of quilting frames ranging from the basic models to larger scale projects. The classic model is capable of creating queen size and smaller while the larger scale industrial styles are built with stronger materials and a wider setting which allows you to create the larger king sizes.</p>
<p>All frames are available in either wood or metal designs giving the customer a way to customize their quilting needs. Models also come with the option for adjustable legs, that can also collapse, which gives them a wider range of height and easy storage. A fourth rail feature keeps your batting off the floor and really helps to set Gracie Bee designs apart from competitors.</p>
<p>A few designs by the grace company include the GQ machine quilting frame. This frame style falls in the top of the line area. It is designed to allow the user to experience an optimal quilting environment. While drawing from features of the past frame designs, the GQ frame has also brought about some really innovative characteristics that truly make it unique in the quilting industry. The carriage is equipped with a fully dual-wheel system that enhances your stitch quality, accuracy, and allows for a smooth and precise motion. The steel construction makes it extra durable and able to withstand heavier use through out the years.</p>
<p>Priced at 2399.95, the GQ frame is QuiltMotionTM compatible, and works with all Grace accessories. You will love the frame\'s new features: New carriage (with SureTrackTM for increased control and ease-of-movement), 1ï¿½" professional steel rails (including Fabri-FastTM system), along with other distinct characteristics. It stands 30-35\' tall, width at 124" with adjust-ability all the way down to crib size, 64". A depth of only 38" give you a space saving design with limitless possibilities.</p>
<p>If your budget doesn\'t allow of course for the top of the heap in their machine sewing frames the classic Gracie frame, which comes in birch wood frame with steel accents. Styles come in three sizes, falling at only 1699.95 the Gracie king is the largest width machine available, length can be set up to 122", the smaller Gracie queen priced at 1299.95. Their sturdy aluminum rails allow you easier fabric handling without needing a baste. Bottom rail is able to flip up so you can see and adjust your layers easier, while the Fabri-Fastï¿½ slots and tubing setup makes the act of attaching your fabric easy, without the worry of tacks, tape, or ties! And like all designs by the grace company adjustable legs are available.</p>
<p>All sewing frames from the grace company come with grace speed control and four bungee clamps. The grace speed control Speed dial gives you a way to set your machine at your desired stitch speed, priced by itself as 69.95 it\'s features are worth every penny. Features include a On/Off Button and a few settings that make your quilting experience all the more enjoyable. The Pulse button runs the machine until you release it, or you can touch and release to allow a single stitch. Also included is a Thread cutter button which you can guess it activates your machine\'s thread cutter (setting is only compatible with the Juki 98 series), and Velcro straps to give you an easy attachment to your quilting machines frame.</p>
<p>One of the newer technologies by the grace company is QUILTER\'S CREATIVE TOUCH, quilting at your fingertips. This system is completely user-friendly software and is designed to allow you the ability to input your design and layout of your quilt projects on any windows 8 through 10 tablet or PC. Along with QuiltMotion you\'ll have everything you need to be able to quilt with flawless precision. A few new features like being able to do all your work through a tablet instead of a laptop or PC really changes your quilting capabilities. With over 200 preset pattern designs and a Pantograph creator, you are able to readjust and custom fit any pattern to any dimension. Also included are a virtual longarm software, text tracer tool, and even a free hand tracer that gives you the ability to trace anything into a pattern for your quilt.</p>
<p>Gracie Bee Quilting really is the best place to go for all of your tools. They have a huge selection of tools, machines, and accessories all in a one stop online atmosphere.</p>
',
                'price_heading' => NULL,
                'features_heading' => 'Product Features',
                'additional_heading' => NULL,
                'reviews_heading' => NULL,
                'price' => '125.55',
                'model' => 'GracieBee',
                'sku' => NULL,
                'upc' => NULL,
                'quantity' => 99,
                'thumbnail' => '/uploads/products/4bIUcwpVOK9_Graciebee.jpg',
                'thumbnail2' => NULL,
                'thumbnail3' => '',
                'photo_album' => NULL,
                'pubished_at' => '0000-00-00 00:00:00',
                'video_url' => '',
                'meta_title' => 'The GracieBee traditional-style quilting',
                'meta_description' => 'The GracieBee traditional-style quilting frame has many non-traditional innovations. Leg joints easily slide together for a snug, sturdy, and balanced fit. Each leg rests on two separate feet, eliminating wobble. All parts fit together without the need fo',
                'meta_keywords' => NULL,
                'facebook_title' => 'The GracieBee traditional-style quilting',
                'google_plus_title' => 'The GracieBee traditional-style quilting',
                'twitter_title' => 'The GracieBee traditional-style quilting',
                'lang' => '',
                'created_at' => '2016-08-19 12:01:56',
                'updated_at' => '2016-08-19 12:01:56',
                'deleted_at' => NULL,
                'filter_class' => 'pf-hq',
                'reviews_tab' => 0,
                'warranty_tab' => 0,
                'docs_tab' => 0,
                'support_tab' => 0,
            ),
            1 =>
            array (
                'id' => 2,
                'status' => 'Online',
                'office_status' => 'Live',
                'availability' => 'Available',
                'slug' => 'z44',
                'ispromo' => 0,
                'is_published' => 1,
                'name' => 'Z44 Adjustable Frame',
                'subtitle' => 'No-Baste Hand Quilting Frame',
                'manufacturer' => 'The Grace Company',
                'details' => '<p>For its affordability, convenience and performance, the Grace Z44 Quilting Frame delivers on its promise to be one of the best investments a quilter can find.</p>',
                'description' => '<h2>Grace Z44 Hand Quilting Frame</h2>

<p>
<strong>When choosing a hand frame for your quilting projects, there are four major points every quilter should consider:</strong>
</p><ul>
<li>Typically hand frames come with three rails. For easier management and a cleaner work flow, a fourth rail would be instrumental.</li>
<li>Look for an easy to maintain unit with precision ratchets and durable aluminum rails that simplifies fabric and tension manipulation without basting.</li>
<li>The scope of projects has to be taken into account. Many frames will only accommodate queen sizes and smaller. If you\'re working on larger sizes, you want a frame that handles them.</li>
<li>Flexibility is critical. If you have limited space, a frame that folds would be ideal. Even better, a unit that folds with fabric still installed. You should also consider height adjustable legs.</li>
</ul>
<p></p>
<p>Fortunately, there\'s the Grace Z44 Quilting Frame. No quilter will be disappointed by its performance. An affordable option, it has a design with all the aforementioned advantages, as well as a range of solid features that will enhance your quilting productivity in every way.</p>
<p>
<strong>Utilizing the Grace Z44 Quilting Frame means access to:</strong>
</p><ul>
<li>Height adjustable legs that require no tools.</li>
<li>Six different tilting angles from vertical to horizontal, enhancing comfort in your work process.</li>
<li>A practical design that ensures leg space is never lost, regardless of frame angle.</li>
<li>Superior tension via a 50 tooth ratchet.</li>
<li>Easy foldaway for convenient storage.</li>
<li>Simplified set up for creating everything from crib (59 inches) to king (108) sizes.</li>
<li>With its Fabri-Fast features, there is no need for ties, tacks or tape. Attaching fabric will never be easier.</li>
<li>A fourth rail for superior batting control.</li>
</ul>
<p></p>
<p>The Grace Z44 Quilting Frame isn\'t merely functional. Engineered from Baltic Birch wood, it has a beautiful finish. Its poles are multi-layered Alderwood laminations with other elements like hardwood, poplar hardwood and plywood to help ensure years of use without warping, twisting or breaking.</p>
<p>Considering its cost, no quilter will be disappointed by the performance of the Grace Z44 Quilting Frame. Improve its flexibility by adjusting rails so that more than one person can work on the same project simultaneously. It also has options for hand applied stain, casters, super king extensions, swing arm lamp and bungee clamps.</p>
<p>For its affordability, convenience and performance, the Grace Z44 Quilting Frame delivers on its promise to be one of the best investments a quilter can find.</p>',
                'price_heading' => NULL,
                'features_heading' => 'Product Features',
                'additional_heading' => NULL,
                'reviews_heading' => NULL,
                'price' => '125.55',
                'model' => 'Z44',
                'sku' => NULL,
                'upc' => NULL,
                'quantity' => 99,
                'thumbnail' => '/uploads/products/B8qJQBKtGoi_z44_sally.jpg',
                'thumbnail2' => NULL,
                'thumbnail3' => '',
                'photo_album' => NULL,
                'pubished_at' => '0000-00-00 00:00:00',
                'video_url' => 'https://www.youtube.com/watch?v=dWDBLEx8riw',
                'meta_title' => 'The Z44 No-Baste Hand Quilting Frame',
                'meta_description' => 'The Z44 is our top of the line hand quilting frame, as well as the most adjustable frame on the market. You can set the included height-adjustable legs to your level without the need of any tools! The work area also tilts to six different angles, letting ',
                'meta_keywords' => NULL,
                'facebook_title' => 'The Z44 No-Baste Hand Quilting Frame',
                'google_plus_title' => 'The Z44 No-Baste Hand Quilting Frame',
                'twitter_title' => 'The Z44 No-Baste Hand Quilting Frame',
                'lang' => '',
                'created_at' => '2016-08-19 15:00:51',
                'updated_at' => '2016-08-19 15:00:51',
                'deleted_at' => NULL,
                'filter_class' => 'pf-hq',
                'reviews_tab' => 0,
                'warranty_tab' => 0,
                'docs_tab' => 0,
                'support_tab' => 0,
            ),
            2 =>
            array (
                'id' => 3,
                'status' => 'Online',
                'office_status' => 'Live',
                'availability' => 'Available',
                'slug' => 'ez3',
                'ispromo' => 0,
                'is_published' => 1,
                'name' => 'Start-Right EZ3',
                'subtitle' => 'No-Baste Hand Quilting Frame',
                'manufacturer' => 'The Grace Company',
                'details' => '<p>The EZ3 is a convenient, adjustable hand quilting frame. The three-rail, no-baste work area can tilt to four different angles. All adjustments can be made and locked in place without the need of any tools, just the knobs that come on the frame. The EZ3 also folds up for space-saving storage.</p>',
            'description' => '<h2>Ez3 Quilting Frame</h2> <p>Have you been searching for a versatile, reasonably priced, and user-friendly quilting frame? If so, the Start-Right EZ3 from The Grace Company could be just what you\'ve been dreaming of. Convenient and highly adjustable, the EZ3 quilting frame was designed with ease of use as a top priority. It is an ideal frame for both beginning and experienced quilters. Novices will appreciate its simple, straight forward operation, while veterans will appreciate how its streamlined workflow saves time and maximizes overall efficiency. </p> <h3>Forget About Basting</h3> <p>For many people new to using a quilting frame, basting is one of the hardest aspects of the process to get used to. Owners of the EZ3 quilting frame can forget all about this problem, though, as it uses a totally basting-free system. Three tough and durable aluminum rails in conjunction with precision ratchets make handling your fabric and maintaining proper tension exceedingly easy -- even for first-time users!</p> <h3>A Wealth of Options</h3> <p>With the EZ3 quilting frame, you can make three different sizes of quilts. So, whether you\'re in the mood for experimenting with a series of small, relatively quick-to-construct quilts or you\'re ready to begin work on your large-scale masterpiece, the EZ3 has you covered. The quilting frame\'s three sizes consist of craft (27 inches), crib (59 inches), and queen (91 inches.) </p> <h3>A Comfortable Workspace</h3> <p>Quilting is a time-consuming hobby. Once you begin a new project, you\'ll spend many hours working on it before it is finally complete. It is essential, both for your enjoyment and for doing your best work, to be comfortable while quilting. The EZ3 can accommodate people of nearly every size and shape. The quilting frame\'s work space can tilt from zero to forty degrees. This makes it easy to find the angle that works best for you. </p> <strong>Key Features</strong> <ul> <li>Supports craft, crib, and queen size projects</li> <li>30-tooth ratchets for strong, consistent tension</li> <li>Folds up for easy storage. Can be kept in a closet, up against the wall, or in other small spaces. It can even be folded with a project still in place!</li> <li>Work area can be adjusted to four different angles for customized comfort and convenience</li> <li>Frame Dimensions: 30 inches x 23 inches x 35 -- 99 inches (depending on selected project size)</li> <li>Work Area Dimensions: 27 inches (craft), 59 inches (crib), 91 inches (queen)</li> </ul>',
                'price_heading' => NULL,
                'features_heading' => 'Product Features',
                'additional_heading' => NULL,
                'reviews_heading' => NULL,
                'price' => '125.55',
                'model' => 'EZ3',
                'sku' => NULL,
                'upc' => NULL,
                'quantity' => 99,
                'thumbnail' => '/uploads/products/J4waDyNDYL7_ez3-new-crib.jpg',
                'thumbnail2' => NULL,
                'thumbnail3' => ' ',
                'photo_album' => NULL,
                'pubished_at' => '0000-00-00 00:00:00',
                'video_url' => NULL,
                'meta_title' => 'The Start-Right EZ3 No-Baste Hand Quilting Frame',
                'meta_description' => 'The EZ3 is a convenient, adjustable hand quilting frame. The three-rail, no-baste work area can tilt to four different angles. All adjustments can be made and locked in place without the need of any tools, just the knobs that come on the frame. The EZ3 al',
                'meta_keywords' => NULL,
                'facebook_title' => 'The Start-Right EZ3 No-Baste Hand Quilting Frame on FaceBook',
                'google_plus_title' => 'The Start-Right EZ3 No-Baste Hand Quilting Frame on Google',
                'twitter_title' => 'The Start-Right EZ3 No-Baste Hand Quilting Frame on Twitter',
                'lang' => '',
                'created_at' => '2016-08-19 15:00:51',
                'updated_at' => '2016-08-19 15:00:51',
                'deleted_at' => NULL,
                'filter_class' => 'pf-hq',
                'reviews_tab' => 0,
                'warranty_tab' => 0,
                'docs_tab' => 0,
                'support_tab' => 0,
            ),
            3 =>
            array (
                'id' => 5,
                'status' => 'Online',
                'office_status' => 'Live',
                'availability' => 'Available',
                'slug' => 'wood-lap-hoop-1',
                'ispromo' => 0,
                'is_published' => 1,
                'name' => 'Wood Lap Hoop',
                'subtitle' => 'Quilting Lap Hoop',
                'manufacturer' => 'The Grace Company',
                'details' => '<p>The Grace Company LapHoops provide easy and comfortable options for hand quilting. These 14ï¿½&nbsp;diameter hoops are perfect for up close and personal quilting.<br></p>',
                'description' => '<p>The Grace Company LapHoops provide you with an easy and comfortable options for quilting. They are perfect for quilting groups, travel, and any place where there might not be much room. Get all the portability without losing functionality! The LapHoops offer absolute control with features like a rotating and tilting work area that can be locked in at any angle. You have the choice of a sturdy plastic or more traditional wood crafted hoop. Free edge tools included!</p>

<p>There are those who love quilting and have developed it to be a great hobby. Besides, there are those who are practicing quilting and sewing for business. As a hobby, it is one of the best methods for leisure time with a group of friends or a party for example baby showers. Many still have not identified strategies to getting the right lap hoop. Preferably, avoid just a simple plastic or some embroidery that is not flexible enough during sewing. When looking for lap hoops, usually we look for those that will make the quilting job easier. Hand quilting is terrible if the tool in use is a distraction rather than of help. Many of the tools are more f fighting with the hands rather than helping in tilting. Every fun of quilting is hence required look for Wood lap hoop from grace hoop.</p>

<h3>Description of a Proper Lap Hoop</h3>
<p>A good lap hoop is known for its originality and ability to maintain position when required. Wood lap hop especially is a significant preference for hand quilting lovers because of the strength and ability to maintain position when needed. A Wood lap hoop will rotate in different angles and stick to the desired positions. It helps the person sewing especially when avoiding stressing situations when trying to adjust their sewing frame. Depending on the density of the fabric is a proper lap hoop is straightforward to change to the expected size. More to it a hoop that is easy to rotate to different angles up to 360 degrees. A proper wood lap hoop also has the required tools for an edge. It makes it easy to sew around the edges with minimal conflictions.</p>

<h3>Wood Lap Hoop Originality</h3>
<p>Most of the materials used to make a wood lap hoop include some original hardwood materials that grace hoop have obtained from natural hardwood. A Wood lap hoop maybe expensive than a plastic stitching hoop but it lasts long enough. People using wood lap hoop confess to owning it for decades and they have to perfect their quilting art over with it. It is flexible and one of the quilting hoop that never disappoints.</p>
Over and over many have tried to learn the tricks behind perfecting quilting with minimal success. With a Wood lap hoop, it is easy.

<h3>Tips to Perfection in Quilting</h3>
<p>First t is wise to use the right wood circle, one that has well-rounded edges, flexible enough to tilt to different angles when requires and the right size. Size 12 and 11 prove to be the best for hand stitching, and they are available at the Grace Company. Consider using lap wood hoop because of the strength and smoothness when sewing. The quilting hoop should be perfect, not one that lets the clothing out and the edged chip every time they have exerted some stitching pressure. Grace company has the best quilting hoops, going for cheap wood lap hoop will make the quilting difficult than ever. Quilting requires a wooden hoop that is strong and will cause the fabric being stitched tight and easy to sew. Using the right quilting hoop, it is advisable to start quilting at the center before one goes to the edges. It makes quilting at the edges easier.</p>

<h3>Wood Lap hoop by the Grace Company</h3>
<p>The grace company is one of the most known companies selling legit wood lap hoop in the market. There are many dealers of lap hoops, stitching hoops, and quilting hoops. However, quilting is never a guarantee. Many people quilting have ended up giving up on creating magnificent pieces because of the poor quality lap hoops in the market. Well, they have not obtained one from the Grace Company because it will never come as a disappointment. There is only one way to enjoy quilting, and that is getting the right quilting hoop. Any hoop with perfect edges that will straighten the fabrics well enough for a good day of quilting.</p>

<h3>Using Wood Lap Hoop While Stitching</h3>
<p>Hand stitching is fun and easy, but Wood lap hoop is what differentiates the different stitches. First is because it can rotate in different angles sewing is easier. Also comparing a handmade stitch and a Wood lap hoop made the stitch, one will notice that the Wood lap hoop made one is neater and smarter. For fabrics meant for large embroideries, wood lap hoop will make the work easy, organized and perfect. The stitching project becomes fun, not one that is full of needle blisters and unorganized stitches. After using a lap hoop one thing that everyone will like about when quilting is that the edge surfaces are smooth and comfortable. They can be tilted, rotated, adjusted to fit the fabric length and easy to straighten. The Grace Company has made quilting more fun by manufacturing the wood lap hoop and getting it out to the world.</p>
',
                'price_heading' => NULL,
                'features_heading' => 'Product Features',
                'additional_heading' => NULL,
                'reviews_heading' => NULL,
                'price' => '139.95',
                'model' => 'WOODLAP',
                'sku' => 'WDLP-14',
                'upc' => '',
                'quantity' => 99,
                'thumbnail' => '/uploads/products/TyOLtB6wZ6i_hoop_ind_18.jpg',
                'thumbnail2' => NULL,
                'thumbnail3' => NULL,
                'photo_album' => NULL,
                'pubished_at' => '0000-00-00 00:00:00',
                'video_url' => '',
                'meta_title' => ' LapHoops ',
                'meta_description' => 'The Grace Company Wood LapHoops provide easy and comfortable options for hand quilting. These 14ï¿½ diameter hoops are perfect for up close and personal quilting.',
                'meta_keywords' => 'Lap Hoops,LapHoops,The Grace Company LapHoops',
                'facebook_title' => 'The Grace Company Wood LapHoops on FaceBook',
                'google_plus_title' => 'The Grace Company Wood LapHoops on GooglePlus',
                'twitter_title' => 'The Grace Company Wood LapHoops on Twitter',
                'lang' => '',
                'created_at' => '2016-09-27 11:24:37',
                'updated_at' => '2016-09-27 11:24:37',
                'deleted_at' => NULL,
                'filter_class' => 'pf-hoop',
                'reviews_tab' => 0,
                'warranty_tab' => 0,
                'docs_tab' => 0,
                'support_tab' => 0,
            ),
            4 =>
            array (
                'id' => 6,
                'status' => 'Online',
                'office_status' => 'Live',
                'availability' => 'Available',
                'slug' => 'poly-lap-hoop',
                'ispromo' => 0,
                'is_published' => 1,
                'name' => 'Poly Lap Hoop',
                'subtitle' => 'Quilting Lap Hoops',
                'manufacturer' => 'The Grace Company',
                'details' => '<p><br></p>',
                'description' => 'The Grace Company Poly LapHoops provide you with an easy and comfortable options for quilting. They are perfect for quilting groups, travel, and any place where there might not be much room. Get all the portability without losing functionality! The Poly LapHoops offer absolute control with features like a rotating and tilting work area that can be locked in at any angle. You have the choice of a sturdy plastic or more traditional wood crafted hoop. Free edge tools included!',
                'price_heading' => NULL,
                'features_heading' => 'Product Features',
                'additional_heading' => NULL,
                'reviews_heading' => NULL,
                'price' => '99.95',
                'model' => 'POLYLAPHOOP',
                'sku' => 'POLYHP',
                'upc' => '',
                'quantity' => 99,
                'thumbnail' => '/uploads/products/4gNErIDUFdi_laphoop_plastic.png',
                'thumbnail2' => NULL,
                'thumbnail3' => NULL,
                'photo_album' => NULL,
                'pubished_at' => '0000-00-00 00:00:00',
                'video_url' => '',
                'meta_title' => 'The Grace Company Poly LapHoops',
                'meta_description' => 'The Grace Company Poly LapHoops provide you with an easy and comfortable options for quilting. They are perfect for quilting groups, travel, and any place where there might not be much room. Get all the portability without losing functionality! The Poly L',
                'meta_keywords' => 'The Grace Company Poly LapHoops,Grace Poly LapHoops',
                'facebook_title' => 'The Grace Company Poly LapHoops on FaceBook',
                'google_plus_title' => 'The Grace Company Poly LapHoops on GooglePlus',
                'twitter_title' => 'The Grace Company Poly LapHoops on Twitter',
                'lang' => '',
                'created_at' => '2016-09-27 11:35:56',
                'updated_at' => '2016-09-27 11:35:56',
                'deleted_at' => NULL,
                'filter_class' => 'pf-hoop',
                'reviews_tab' => 0,
                'warranty_tab' => 0,
                'docs_tab' => 0,
                'support_tab' => 0,
            )

        ));


    }
}
