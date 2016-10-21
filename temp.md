


still waiting by sum 41


https://placehold.it/64x64/1A5276/FFFFFF?text=placeholder+image




        $credentials = array(
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

  FlashAlert()->success('Success!', 'The Product Was Successfully Added');

FlashAlert()->error('Invalid login or password!');
return Redirect::back()->withInput();




helperFunctions::getPageInfo($cart,$total);



helperFunctions::getPageInfo($cart,$total);

docs.laramaker.apiary.io
app.apiary.io/laramaker


	  if (!empty($request->attribute_name))
		{
			foreach ($request->attribute_name as $key => $item)
			{
				$productVariant                          = new ProductVariant();
				$productVariant->attribute_name          = $item;
				$productVariant->product_attribute_value = $request->product_attribute_value[$key];
				$product->productVariants()->save($productVariant);
			}
		}

		if (!empty($request->plis))
		{
			foreach ($request->plis as $key => $item)
			{
				$productListItem           = new ProductListItem();
				$productListItem->li       = $item;
				$productListItem->li_value = $input->li_value[$key];
				$product->productListItems()->save($productListItem);
			}
		}


I just stumbled upon this good read for people answering the phones  http://lifehacker.com/im-a-telemarketer-heres-how-to-get-rid-of-me-1540911401 https://www.donotcall.gov/



<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-26466467-1', 'auto', {'alwaysSendReferrer': true});
	ga('set', 'dimension2', $.cookie("UserType"));
	ga('set', 'dimension5', 'NO'); // Default to NO for User Did Chat
	ga('require', 'displayfeatures');
	ga('require', 'ec', 'ec.js');
		ga('ec:addProduct', {
			'id': 'MOWLAWN',
			'name': 'Lawn Mowing',
			'brand': 'TaskEasy',
			'category': 'MOWLAWN'
		});
		ga('ec:setAction', 'detail');
	// Optimizely Universal Analytics Integration Code
	window.optimizely = window.optimizely || [];
	window.optimizely.push("activateUniversalAnalytics");
	ga('send', 'pageview');
</script>

// https://laracasts.com/series/laravel-5-fundamentals/episodes/25
// link_to_action('CartController@show', $latest->name, [$latest->id])



	private function generateParams()
	{
		$statuses      = Option::where('category', 'product_status')->lists('title', 'value');
		$product_types = Option::where('category', 'product_type')->lists('title', 'value');
		$categories    = $this->categoryRepository->getAll()
							  ->orderBy('id', 'desc')
							  ->get()
							  ->lists('name', 'id');
		view()->share('statuses', $statuses);
		view()->share('product_types', $product_types);
		view()->share('categories', $categories);
	}




http://stackoverflow.com/questions/23678250/laravel-nested-uri-getting-parent-of-parent-etc


 public function PageRoute($pageId, $parent, $prevUri = null, $searchTerm = false)
    {
        if (isset($parent) && $parent == null)
            $pages = DB::table('tblpages')
                ->select('tblpages.id','tblpages.uri')
                ->whereNull('tblpages.parent')
                ->where('tblpages.is_active', '=', true)
                ->get();
        else
            $pages = DB::table('tblpages')
                ->select('tblpages.id', 'tblpages.uri', 'tblpages.parent')
                ->where('tblpages.parent', '=', $pageId)
                ->where('tblpages.name', 'LIKE', $searchTerm)
                ->where('tblpages.is_active', '=', true)
                ->get();

        $path = array();

        foreach ($pages as $page)
        {
            if ($page->uri != '/')
                $page->uri = $prevUri.'/'.$page->uri;

            $path[$page->id] = $page;

            $path = self::PageRoute($page->id, $page->uri, $prevUri) + $path;
        }

        return $path;
    }






php artisan infyom:api_scaffold Product --fromTable --tableName="products" --save

php artisan infyom:api_scaffold Product --fieldsFile="resources/model_schemas/Product.json"


{(\s*?.*?)*?}

<!-- Filter Class Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filter_class', 'Filter Class:') !!}
    {!! Form::select('filter_class', ['pf-new' => 'pf-new', 'pf-qn' => 'pf-qn', 'pf-mq' => 'pf-mq', 'pf-hq' => 'pf-hq', 'pf-hoop' => 'pf-hoop', 'pf-acc' => 'pf-acc'], null, ['class' => 'form-control']) !!}
</div>

		<!-- Ispromo Field -->
		<div class="form-group col-sm-2">
			{!! Form::label('ispromo', 'Is On Promotion:') !!}
			<label class="checkbox">
			{!! Form::checkbox('ispromo', 0, null,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('ispromo') ]) !!}
			</label>
		</div>
		<!-- Is Published Field -->
		<div class="form-group col-sm-2">
			{!! Form::label('is_published', 'Is Published:') !!}
			<label class="checkbox ">
			{!! Form::checkbox('is_published', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Published', 'data-off'=>'NotPublished','data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_published') ]) !!}
			</label>
		</div>

	<!-- Category Field -->
		<div class="form-group col-md-2">
			{!! Form::label('category', 'Category:') !!}
			<select class="form-control" name="categories[]" id="categories">
				@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->title }}</option>
				@endforeach
			</select>
		</div>





<select class="form-control" id="status" name="status">
<option value="available">Available</option>
<option value="InStock">InStock</option>
<option value="OnHold">OnHold</option>
<option value="OnBackorder">OnBackorder</option>
<option value="PreOrders">PreOrders</option>
<option value="PromoActive">PromoActive</option>
<option value="SoldOut">SoldOut</option>
<option value="Discontinued">Discontinued</option>
</select>




table.table>tr>th>{heading}>tr>td*3
<a class="btn btn-default active" href="{!! url(getLang() . '/admin/video/index') !!}">Videos </a>


// Run this in web console

var rows = $('table tr').get();
rows.sort(function(a, b) {
  var keyA = $(a).find('img[src="/lib/images/success.png"]').attr('title') || '0';
  var keyB = $(b).find('img[src="/lib/images/success.png"]').attr('title') || '0';
  if (keyA < keyB) return -1; if (keyA > keyB) return 1; return 0;
});
$.each(rows, function(index, row) {$('table tbody').append(row);});


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

tar -zcvf stage-grace-oct-24-2016.tar.gz /var/www/vhosts/gracecompany/stage.grace


tar ---exclude-vcs --exclude=*.mov --exclude=*.wmv --exclude=*.avi --exclude=.git/* --exclude=storage/* --exclude=cache/* --exclude=nbproject/* --exclude=zipa/* --exclude=zips/* --exclude=*.rar --exclude=*.tar.gz --exclude=*.zip --exclude=*.psd --exclude=*.tiff --exclude=*.tif --exclude=.phils/* --exclude=.idea/* --exclude=*.mp4 -zcvf




tar -zcvf grace.reset-app-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset/app && mv ./grace.reset-app-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset/zipa/

tar -zcvf grace.reset-database-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset/database && mv ./grace.reset-database-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset/zipa/

tar -zcvf grace.reset-resources-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset/resources && mv ./grace.reset-resources-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset/zipa/



tar ---exclude-vcs
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
 -zcvf grace.reset-oct-24-2016.tar.gz /home/vagrant/gr/grace.reset


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
this-oct-5-2016.tar.gz
/var/www/vhosts/gracecompany/stage.grace
&& mv ./this-oct-5-2016.tar.gz /var/www/vhosts/.down
&&  chmod 777 /var/www/vhosts/.down -R


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







<!-- BEGIN Schema.org microdata added by Add-Meta-Tags WordPress plugin -->
<!-- Scope BEGIN: Product -->
<div itemscope itemtype="http://schema.org/Product">
<meta itemprop="url" content="http://www.handquiltingframe.com/grace-product/didi-lap-hoop/" />
<meta itemprop="name" content="Didi Lap Hoop" />
<meta itemprop="description" content="The Didi Lap Hoop" />
<meta itemprop="releaseDate" content="2014-10-09T19:43:36+00:00" />
<!-- Scope BEGIN: ImageObject -->
<span itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
<meta itemprop="name" content="DidiLaphoopCatalogImage" />
<meta itemprop="url" content="http://www.handquiltingframe.com/grace-product/didi-lap-hoop/didilaphoopcatalogimage-2/" />
<meta itemprop="thumbnailUrl" content="http://www.handquiltingframe.com/wp-content/uploads/2014/10/DidiLaphoopCatalogImage1-150x150.jpg" />
<meta itemprop="contentUrl" content="http://www.handquiltingframe.com/wp-content/uploads/2014/10/DidiLaphoopCatalogImage1.jpg" />
<meta itemprop="width" content="370" />
<meta itemprop="height" content="432" />
<meta itemprop="encodingFormat" content="image/jpeg" />
<meta itemprop="text" content="Didi Lap hoop" />
</span> <!-- Scope END: ImageObject -->
<meta itemprop="category" content="Hand Quilting Hoop" />
<span itemprop="weight" itemscope itemtype="http://schema.org/QuantitativeValue">
<meta itemprop="value" content="3.628736" />
<meta itemprop="unitText" content="kg" />
</span>
<span itemprop="width" itemscope itemtype="http://schema.org/QuantitativeValue">
<meta itemprop="value" content="18" />
<meta itemprop="unitText" content="in" />
</span>
<span itemprop="depth" itemscope itemtype="http://schema.org/QuantitativeValue">
<meta itemprop="value" content="17" />
<meta itemprop="unitText" content="in" />
</span>
<span itemprop="height" itemscope itemtype="http://schema.org/QuantitativeValue">
<meta itemprop="value" content="3" />
<meta itemprop="unitText" content="in" />
</span>
<meta itemprop="itemCondition" content="http://schema.org/NewCondition" />
<meta itemprop="sku" content="636343172649" />
<!-- Scope BEGIN: Offer -->
<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<meta itemprop="availability" content="http://schema.org/InStock" />
<meta itemprop="price" content="89.95" />
<meta itemprop="priceCurrency" content="USD" />
</span> <!-- Scope END: Offer -->
<div> <!-- Product text body: BEGIN -->
Get The Didi Lap Hoop. Get up close and personal with your projects with this convenient lap hoop. The diameter of the hoop is 14 inches and good for a variety of projects.This hoop is a favorite of Diedra McElroy of Roxanne International. Its unique square shape is better than round hoops for holding the tension in the square weave of fabrics.
<ul style="width: 90%;">
	<li>Square hoop design for superior fabric holding</li>
	<li>14 inch diameter hoop</li>
	<li>Adjustable outer hoop for various fabric thicknesses</li>
	<li>Edge tools included for even tension all the way to the edges of your project</li>
</ul>
<figure id="attachment_552" style="width: 200px;" class="wp-caption alignright"><img class="attachment-full wp-image-552" src="http://www.handquiltingframe.com/wp-content/uploads/2014/10/didi1.jpg" alt="Didi McElroy" width="200" height="194" /><figcaption class="wp-caption-text">A favorite of Diedra McElroy</figcaption></figure>
</div> <!-- Product text body: END -->
</div> <!-- Scope END: Product -->
<!-- END Schema.org microdata added by Add-Meta-Tags WordPress plugin -->




















<meta name="msvalidate.01" content="87F5711B3975FE3252A662415216888A" />
<meta name="msvalidate.01" content="01D05F5D18D17599A544A41F684CA683" />
<link href="https://plus.google.com/115263752745007524592?rel=author" rel="author" />
<link href="https://plus.google.com/+Handquiltingframe?rel=publisher" rel="publisher" />
<link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap_index.xml">
<meta name="mobile-web-app-capable" content="yes">
<meta name="abstract" content="Manufacturer of the Grace Company Product Lines, hand quilting frames, quilting hoops, Qnique quilter quilting machines, grace quilting frames and many quilting accessories." />
<link rel="profile" href="http://microformats.org/profile/specs" />
<link rel="profile" href="http://microformats.org/profile/hatom" />





<!-- BEGIN Metadata added by Add-Meta-Tags WordPress plugin -->
<meta name="robots" content="NOODP,NOYDIR" />
<meta name="description" content="Square hoop for better even fabric tension Comes with either a 24, 18 or 14 hoop Included thread and scissor holders Height adjustable Tilt adjustable work area" />
<meta name="keywords" content="grace hand quilting frames, grace quilting frames, hand quilting frames, by the grace company, grace hoop2, hand quilting hoop, grace hoop, hand quilting, quilting hoop, square hoop, hoop2 two box, grace hoop2 box 1 ( 7lbs - 26, 26, 2), grace hoop2 box 2 ( 17lbs - 41,11,8 )" />
<meta name="twitter:card" content="product" />
<meta name="twitter:site" content="@https://twitter.com/BuildingSetToys" />
<meta name="twitter:title" content="The Grace Hoop2" />
<meta name="twitter:description" content="Square hoop for better even fabric tension Comes with either a 24, 18 or 14 hoop Included thread and scissor holders Height adjustable Tilt adjustable work area" />
<meta name="twitter:image" content="http://www.handquiltingframe.com/wp-content/uploads/2014/10/Grace-Hoop2-Swivel-Frame.jpg" />
<meta name="twitter:image:width" content="370" />
<meta name="twitter:image:height" content="432" />
<link rel="publisher" type="text/html" title="Hand Quilting Frames and Quilting Hoops" href="https://plus.google.com/+BuildingsetsToysManufacturer/" />
<link rel="author" type="text/html" title="phillipmadsen" href="http://www.handquiltingframe.com/author/phillipmadsen/" />




<!-- This site is optimized with the Yoast SEO plugin v2.3.2 - https://yoast.com/wordpress/plugins/seo/ -->
<meta name="robots" content="noodp,noydir"/>
<meta name="description" content="The Grace Hoop2 - Square quilts should be quilted on a square hoop. The Grace Hoop 2 is the foremost line of square hoops designed to make hoop quilting easier."/>
<link rel="canonical" href="http://www.handquiltingframe.com/grace-product/the-grace-hoop2/" />
<link rel="publisher" href="https://plus.google.com/+Handquiltingframes"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="The Grace Hoop2" />
<meta property="og:description" content="The Grace Hoop2 - Square quilts should be quilted on a square hoop. The Grace Hoop 2 is the foremost line of square hoops designed to make hoop quilting easier." />
<meta property="og:url" content="http://www.handquiltingframe.com/grace-product/the-grace-hoop2/" />
<meta property="og:site_name" content="Hand Quilting Frames and Quilting Hoops" />
<meta property="article:publisher" content="https://www.facebook.com/HandQuiltingFrames" />
<meta property="article:author" content="https://www.facebook.com/affordableprogrammer" />
<meta property="article:tag" content="Grace Hoop2" />
<meta property="fb:app_id" content="706142776141536" />
<meta property="og:image" content="http://www.handquiltingframe.com/wp-content/uploads/2014/10/Grace-Hoop2-Swivel-Frame.jpg" />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:description" content="The Grace Hoop2 - Square quilts should be quilted on a square hoop. The Grace Hoop 2 is the foremost line of square hoops designed to make hoop quilting easier."/>
<meta name="twitter:title" content="The Grace Hoop2"/>
<meta name="twitter:site" content="@QuiltingFrame"/>
<meta name="twitter:domain" content="Hand Quilting Frames and Quilting Hoops"/>
<meta name="twitter:image:src" content="http://www.handquiltingframe.com/wp-content/uploads/2014/10/Grace-Hoop2-Swivel-Frame.jpg"/>
<meta name="twitter:creator" content="@affordableprogr"/>
<!-- / Yoast SEO plugin. -->









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




<div class="option col-md-3" op-index="' + options_counter + '">
<a class="btn btn-danger fa-lg  fa-fw remove-option" aria-label="Delete"><i class="fa fa-trash-o " aria-hidden="true"></i></a>&nbsp;
<label for="options"><strong>Option Name:</strong></label> &nbsp;

<a class="list-group-item" href="#"><i class="fa fa-times fa-fw remove-option" aria-hidden="true"></i> <input type="text" name="options[' + options_counter + '][name]"></a>

<div class="list-group">
  <a class="list-group-item" href="#"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Home</a>
  <a class="list-group-item" href="#"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp; Library</a>
  <a class="list-group-item" href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; Applications</a>
  <a class="list-group-item" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Settings</a>
</div>

<div class="list-group">
	<a class="list-group-item" href="#"><i class="fa fa-times fa-fw remove-option" aria-hidden="true"></i> <input type="text" name="options[' + options_counter + '][name]"></a>

<div class="row options">
    <div class="form-group col-md-12">
        <h3><label for="options">{{trans('product.productoptions')}} : </label></h3>
        <hr>
            <div id="add_product_option" class=" btn btn-sm btn-primary">+ Add Option</div>
            <div class="col-md-12">
                <div class="options-group row"> </div>
            </div>
    </div>
</div>




Online:online,Offline:offline,Removed:removed,Archived:archived,Discontinued:discontinued
The Grace Company :the grace company
Available:available,InStock:instock,OnHold:onhold,OnBackorder:onbackorder,PreOrders:preorders,PromoActive:promoactive,SoldOut:soldout,Discontinued:discontinued
Draft:draft,Review:review,inDesign:indesign,inProof:inproof,inProcess:inprocess,Hidden:hidden,Deleted:deleted,Live:live,Offline:offline,Removed:removed

&nbsp;

<span class="fa fa-times fa-lg remove-option"></span>

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

