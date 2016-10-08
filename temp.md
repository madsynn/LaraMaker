


docs.laramaker.apiary.io
app.apiary.io/laramaker



alias productcontroller='subl /var/www/vhosts/gracecompany/stage.grace/app/Http/Controllers/ProductController.php'
alias shop='cd /var/www/vhosts/gracecompany/stage.grace/resources/views/frontend/shop/'
alias openshop='subl /var/www/vhosts/gracecompany/stage.grace/resources/views/frontend/shop/index.blade.php'
alias product='subl /var/www/vhosts/gracecompany/stage.grace/resources/views/frontend/shop/product.blade.php'
alias res='cd /var/www/vhosts/gracecompany/stage.grace/resources/'
alias resb='cd /var/www/vhosts/gracecompany/stage.grace/resources/views/backend'
alias resf='cd /var/www/vhosts/gracecompany/stage.grace/resources/views/frontend'


alias gitlfs1='sudo apt-get install python-software-properties'
alias gitlfs2='sudo add-apt-repository ppa:git-core/ppa'
alias gitlfs3='sudo apt-get update'
alias gitlfs4='sudo apt-get update'
alias gitlfs5='curl -s https://packagecloud.io/install/repositories/github/git-lfs/script.deb.sh | sudo bash'
alias gitlfs6='sudo apt-get install git-lfs'
alias gitlfs7='sudo git lfs install'
alias gitlfs8=''

tar -zcvf stage-grace-oct-5-2016.tar.gz /var/www/vhosts/gracecompany/stage.grace





{{ str_limit(htmlspecialchars_decode(strip_tags($product->details)),45,' ...') }}

$user = App\Models\User::first();

$cart = new App\Models\Cart;

$user->cart()->save($cart);

$elem->product_id = 1;
  $cart->add(product_id = 1);

$products = App\Models\Product::all();
$cart = App\Models\Cart::fist();


"filp/whoops": "^2.1"

gzip -c qniquequilter.com-error.log > qniquequilter.com-error.log.gz

tar -zcvf date +"%m_%d_%Y".tar.gz /var/www/vhosts/fungamesandtoys.com/wp-content/themes/knucklestrutz

git archive --format=tar -o ~/buildingsets.toys-dec-15-2015.tar -v HEAD







$cart = new App\Models\Cart;
$cart->user_id = $user->id;
$cart->product_id = 1;
$cart->amount = 3;

$cart->created_at = Carbon\Carbon::now();
$cart->updated_at = Carbon\Carbon::now();

$user->cart()->save($cart);





tar
--exclude-vcs
--exclude=*.mov
--exclude=*.wmv
--exclude=*.avi
--exclude=.git/*
--exclude=storage/*
--exclude=cache/*
--exclude=nbproject/*
--exclude=zipa/*
--exclude=zips/*
--exclude=*.rar
--exclude=*.tar.gz
--exclude=*.zip
--exclude=*.psd
--exclude=*.tiff
--exclude=*.tif
--exclude=.phils/*
--exclude=.idea/*
--exclude=*.mp4
 -zcvf
qniqueThemes-oct-7-2016.tar.gz
/var/www/vhosts/qniquequilter.com/wp-content/themes
&& mv ./qniqueThemes-oct-7-2016.tar.gz /var/www/vhosts/.down
&&  chmod 777 /var/www/vhosts/.down -R










'status'
'office_status'
'availability'
'slug'
'ispromo'
'is_published '
'name'
'subtitle'
'details'
'description'
'price_heading'
'features_heading'
'additional_heading'
'reviews_heading'
'price'
'model'
'sku'
'upc'
'quantity'
'thumbnail'
'thumbnail2'
'thumbnail3'
'photo_album'
'pubished_at'
'video_url'
'meta_title'
'meta_description'
'meta_keywords'
'facebook_title'
'google_plus_title'
'twitter_title'
'filter_class'
'datalayer'
'tracking'
'reviews_tab'
'warranty_tab'
'docs_tab'
'support_tab'
'lang'



'status',
 'office_status', 'availability', 'slug', 'ispromo', 'is_published ', 'name', 'subtitle', 'details', 'description', 'price_heading', 'features_heading', 'additional_heading', 'reviews_heading', 'price', 'model', 'sku', 'upc', 'quantity', 'thumbnail', 'thumbnail2', 'thumbnail3', 'photo_album', 'pubished_at', 'video_url', 'meta_title', 'meta_description', 'meta_keywords', 'facebook_title', 'google_plus_title', 'twitter_title', 'filter_class', 'datalayer', 'tracking', 'reviews_tab', 'warranty_tab', 'docs_tab', 'support_tab', 'lang'

'photo' => $request->photo,
'address' => $request->address,
'city' => $request->city,
'state' => $request->state,
'zipcode' => $request->zipcode,
'country' => $request->country,
'about_me' => $request->about_me,
'website' => $request->website,
'company' => $request->company,
'gender' => $request->gender,
'phone' => $request->phone,
'mobile' => $request->mobile,
'work' => $request->work,
'other' => $request->other,
'dob' => $request->dob,
'skypeid' => $request->skypeid,
'githubid' => $request->githubid,
'twitter_username' => $request->twitter_username,
'instagram_username' => $request->instagram_username,
'facebook_username' => $request->facebook_username,
'facebook_url' => $request->facebook_url,
'linked_in_url' => $request->linked_in_url,
'google_plus_url' => $request->google_plus_url,
'slug' => $request->slu,
'display_name' => $request->display_name








$(document).ready(function(){

        $('.flash-message').delay(3000).fadeOut(300);
        $('.alert').delay(3000).slideUp(300);

        $('.dropdown-menu').click(function(e) {
            e.stopPropagation();
        });

        $('.cart').click(function(e) {
            $('.cart .dropdown-toggle').toggleClass('fa-shopping-cart');
            $('.cart .dropdown-toggle').toggleClass('fa-times');
        });

        $('#search-toggle').click(function(){
            $('#search').toggle();
            $('#search').toggleClass('bounceInRight');
        });

        $('.display-img').click(function(){
            var current = $('.product .images .main img').attr('src');
            $('.product .images .main img').attr('src',$(this).attr('src'));
            $(this).attr('src',current);
        });

        $('.section').mouseover(function(){
            $(this).children('.categories').show();
        });

        $('.section').mouseleave(function(){
            $(this).children('.categories').hide();
        });

        $(".clickable").click(function() {
            window.document.location = $(this).data("href");
        });

        $('#plus-qty').click(function(){
            $('.qty').val(Number($('.qty').val())+1);
        });

        $('#minus-qty').click(function(){
            if (Number($('.qty').val()) != 1) {
                $('.qty').val(Number($('.qty').val())-1);
            };
        });

        $('.plus-cart-qty').click(function(){
            $(this).prevAll('.qty').val(Number($(this).prevAll('.qty').val())+1);
            var target = '.mycart .product-' + $(this).parent().parent().attr('prod-id') + ' .save';
            $(target).show();
        });

        $('.minus-cart-qty').click(function(){
            if (Number($(this).prevAll('.qty').val()) != 1) {
                $(this).prevAll('.qty').val(Number($(this).prevAll('.qty').val())-1);
                var target = '.mycart .product-' + $(this).parent().parent().attr('prod-id') + ' .save';
                $(target).show();
            };
        });

        $('.save').click(function(){
            var target = '.mycart .product-' + $(this).parent().parent().attr('prod-id') + ' .qty';
            var oldqty = Number($(this).parent().parent().attr('qty'));
            var newqty = Number($(target).val());
            $(target).val(newqty-oldqty);
            $(this).parent().parent().find('form').submit();
        });

        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })

    });







Privacy Policy
Earnings Disclaimer
Disclaimer
Testimonials Disclosure
Linking Policy
Refund-Policy
Affiliate Agreement
Antispam
FTC Statement
Amazon Affiliate
Double Dart Cookie
External Links Policy
Affiliate Disclosure
FB Policy


{"fieldInput": "created_at:dateTime:nullable", "htmlType": "date", "validations": "", "searchable": false, "fillable": true, "primary": false, "inForm": false, "inIndex": true },
{"fieldInput": "updated_at:dateTime:nullable", "htmlType": "date", "validations": "", "searchable": false, "fillable": true, "primary": false, "inForm": false, "inIndex": false },







    "homepage": "https://github.com/jayaregalinada/common.git",


            "homepage": "https://github.com/jayaregalinada",


status
office_status
availability
slug
ispromo
is_published
name
subtitle
manufacturer
details
description
price_heading
features_heading
additional_heading
reviews_heading
waranty_heading
support_heading
docs_heading
price
model
sku
upc
quantity
thumbnail
thumbnail2
thumbnail3
photo_album
pubished_at
video_url
meta_title
meta_description
meta_keywords
facebook_title
google_plus_title
twitter_title
datalayer
tracking
reviews_tab
warranty_tab
docs_tab
support_tab
lang
filter_class


        factory(App\Models\Product::class, 50)->create();
        factory(App\Models\CategoryProduct::class, 50)->create();
        factory(App\Models\Price::class, 50)->create();

.sublime-macro


{{ old('description',!empty($product)?$product->description:'') }}


subl /var/www/vhosts/qniquequilter.com/wp-content/themes/qnique/footer.php

