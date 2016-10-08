<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
	public function __construct(){
	  $this->data = array(
		'appcolor' => 'bg-darkTeal',
	  );

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * [getDashboard description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getDashboard($id='1'){

		$this->data['js'] = array(
			'flot'         => 'metro/plugins/flot/jquery.flot.js',
			'flot-tooltip' => 'metro/plugins/flot/jquery.flot.tooltip.min.js',
			'flot-spline'  => 'metro/plugins/flot/jquery.flot.spline.js',
			'flot-resize'  => 'metro/plugins/flot/jquery.flot.resize.js',
			'flot-pie'     => 'metro/plugins/flot/jquery.flot.pie.js',
			'flot-symbol'  => 'metro/plugins/flot/jquery.flot.symbol.js',
			'flot-time'    => 'metro/plugins/flot/jquery.flot.time.js',
			'summernote'   => 'metro/plugins/summernote/summernote-metro.js',
			'sparkline'    => 'metro/plugins/sparkline/jquery.sparkline.js',
			'chartjs'      => 'metro/plugins/chartjs/Chart.js',
			'peity'        => 'metro/plugins/peity/jquery.peity.js',
		);

		$this->data['css'] = array(
			'summernote'     => 'metro/plugins/summernote/summernote.css' ,
			'summernote-bs3' => 'metro/plugins/summernote/summernote-metro.css' ,
		);

		return view('admin.dashboard.'.$id, $this->data );

	}

	public function getForm($id = 'basic'){

		$this->data['js'] = array(
			'ionrangeslider' => 'metro/plugins/ionRangeSlider/ion.RangeSlider.min.js',
			'jsknob'         => 'metro/plugins/jsKnob/jquery.knob.js',
			'bstagsinput'    => 'metro/plugins/bstagsinput/bootstrap-tagsinput.js',
			'clockpicker'    => 'metro/plugins/clockpicker/clockpicker.js',
			'colorpicker'    => 'metro/plugins/colorpicker/bootstrap-colorpicker.min.js',
			'spectrum'       => 'metro/plugins/spectrum/spectrum.js',
			'jasny'          => 'metro/plugins/jasny/jasny-bootstrap.min.js',
			'switchery'      => 'metro/plugins/switchery/switchery.js',

		);

		$this->data['css'] = array(
			'ionrangeslider'          => 'metro/plugins/ionRangeSlider/ion.RangeSlider.css',
			'ionrangeslider_skinflat' => 'metro/plugins/ionRangeSlider/ion.RangeSlider.skinFlat.css',
			'bstagsinput'             => 'metro/plugins/bstagsinput/bootstrap-tagsinput.css',
			'clockpicker'             => 'metro/plugins/clockpicker/clockpicker.css',
			'colorpicker'             => 'metro/plugins/colorpicker/bootstrap-colorpicker.min.css',
			'spectrum'                => 'metro/plugins/spectrum/spectrum.css',
			'jasny'                   => 'metro/plugins/jasny/jasny-bootstrap.min.css',
			'switchery'               => 'metro/plugins/switchery/switchery.css',

		);

		if( $id == 'xeditable'){

			$this->data['js'] = array(
				'moment'            => 'metro/plugins/xeditable/moment.min.js',
				'mockjax'           => 'metro/plugins/xeditable/jquery.mockjax.js',
				'poshytip'          => 'metro/plugins/xeditable/jquery.poshytip.js',
				'poshytip_editable' => 'metro/plugins/xeditable/jquery-editable-poshytip.js',
				'jqui'              => 'metro/plugins/xeditable/jquery-ui-1.10.3.custom.js',
				'address'           => 'metro/plugins/xeditable/address.js',
				'demo-mock'         => 'metro/plugins/xeditable/demo-mock.js',
				'demo'              => 'metro/plugins/xeditable/demo.js',

			);

			$this->data['css'] = array(
				'jqui'     => 'metro/plugins/xeditable/jquery-ui-1.10.1.custom.css',
				'address'  => 'metro/plugins/xeditable/address.css',
				'tips'     => 'metro/plugins/xeditable/tip-metro.css',
				'editable' => 'metro/plugins/xeditable/jquery-editable.css',

			);

		}

		if( $id == 'wizard' ){

			$this->data['js'] = array(
				'jquery_step' => 'metro/plugins/jquery.steps/jquery.steps.min.js',
				'validate'    => 'metro/plugins/validate/jquery.validate.min.js',
			);

			$this->data['css'] = array(
				'jquery_step' => 'metro/plugins/jquery.steps/jquery.steps.css',
			);


		}

		if( $id == 'editor'){

			$this->data['js'] = array(
				'jqte'         => 'metro/plugins/jqte/jquery-te-1.4.0.min.js',
				'summernote'   => 'metro/plugins/summernote/summernote-metro.js',
			);

			$this->data['css'] = array(
				'summernote'     => 'metro/plugins/summernote/summernote.css' ,
				'summernote-bs3' => 'metro/plugins/summernote/summernote-metro.css' ,
				'jqte'           => 'metro/plugins/jqte/jquery-te-1.4.0.css',

			);

		}


		return view('admin.form.'.$id, $this->data);

	}

	/**
	 * ui control metro
	 * @param  string $id page name
	 * @return string     page result
	 */
	public function getUicontrol($id = 'accordion'){


		return view('admin.uicontrol.'.$id, $this->data);

	}

	/**
	 * ui visual metro
	 * @param  string $id page name
	 * @return string     page result
	 */
	public function getVisual($id = 'tile'){


		return view('admin.visual.'.$id, $this->data);

	}

	/**
	 * various table
	 * @param  string $id table type
	 * @return string     result as html
	 */
	public function getTable($id = 'basic')
	{

		$this->data['js'] = array(
			'datatable' => 'metro/plugins/DataTables/datatables.min.js',
		);

		$this->data['css']  = array(
			'datatable' => 'metro/plugins/DataTables/datatables.metro.css',
		);

		return view('admin.table.'.$id, $this->data);
	}

	/**
	 * various gallery
	 * @param  string $id gallery type
	 * @return string     result as html
	 */
	public function getGallery($id = 'gallery1')
	{

		$this->data['js'] = array(
			'lightbox'  => 'metro/plugins/lightbox/js/lightbox-2.6.min.js',
			// 'masonry'   => 'metro/plugins/jquery.masonry.min.js',
			// 'mixitup'   => 'metro/plugins/jquery.mixitup.min.js',

		);

		$this->data['css']  = array(
			'lightbox' => 'metro/plugins/lightbox/css/lightbox.css',
		);

		if( $id == 'gallery2'){

			// important note!
			// this css is to adjust screen width for js shuffle plugins
			// or any other masonry plugins
			$this->data['js']['modernizr'] = 'metro/plugins/modernizr/js/modernizr.js';
			$this->data['js']['shuffle']   = 'metro/plugins/shuffle/js/jquery.shuffle.js';
			$this->data['css']['masonry']  = 'metro/plugins/masonry/metro-masonry.css';

		}


		if($id=='dropzone'){
			$this->data['js']['dropzone']        = 'metro/plugins/dropzone/dropzone.js';
			$this->data['css']['dropzone']       = 'metro/plugins/dropzone/dropzone.css';
			$this->data['css']['dropzone_basic'] = 'metro/plugins/dropzone/basic.css';
		}


		return view('admin.gallery.'.$id, $this->data);
	}

	public function getChart($id = 'chartjs')
	{
		if($id=='chartjs'){
			$this->data['js']['chartjs'] = 'metro/plugins/chartjs/Chart.min.js';
		}

		if($id=='flot'){
			$this->data['js']['flot']             = 'metro/plugins/flot/jquery.flot.js';
			$this->data['js']['flot.tooltip.min'] = 'metro/plugins/flot/jquery.flot.tooltip.min.js';
			$this->data['js']['flot.resize']      = 'metro/plugins/flot/jquery.flot.resize.js';
			$this->data['js']['flot.pie']         = 'metro/plugins/flot/jquery.flot.pie.js';
			$this->data['js']['flot.symbol']      = 'metro/plugins/flot/jquery.flot.symbol.js';
			$this->data['js']['flot.time']        = 'metro/plugins/flot/jquery.flot.time.js';
			$this->data['js']['flot.categories']  = 'metro/plugins/flot/jquery.flot.categories.js';
			$this->data['js']['flot.spline']      = 'metro/plugins/flot/jquery.flot.spline.js';

		}

		if($id=='morris'){
			$this->data['js']['morris']  = 'metro/plugins/morris/morris.js';
			$this->data['js']['raphael'] = 'metro/plugins/morris/raphael-2.1.0.min.js';

		}

		if($id=='peity'){
			$this->data['js']['peity']  = 'metro/plugins/peity/jquery.peity.js';

		}

		if($id=='sparkline'){
			$this->data['js']['sparkline'] = 'metro/plugins/sparkline/jquery.sparkline.js';

		}

		return view('admin.chart.'.$id, $this->data);
	}


	public function getUicomponent($id ='grid')
	{


		return view('admin.uicomponent.'.$id, $this->data);

	}

	public function getPricetable($id='')
	{

		return view('admin.pricetable.'.$id, $this->data);
	}

	public function getPowerbuilder($id='')
	{
		$this->data['js']['be_html'] = 'metro/plugins/beautify/beautify-html.js';
		$this->data['js']['zencode'] = 'metro/plugins/jQuery-ZenCoding.js';
		$this->data['js']['HTML']    = 'metro/plugins/HTML.js';
		$this->data['js']['pb']      = 'metro/plugins/powerbuilder/'.$id.'.js';
		$this->data['js']['jqui']    = 'metro/plugins/jquery-ui.min.js';
		// $this->data['js']['nano']    = 'metro/plugins/nanoscroller/js/jquery.nanoscroller.js';

		// $this->data['css']['nano']   = 'metro/plugins/nanoscroller/css/nanoscroller.css';

		return view('admin.powerbuilder.'.$id, $this->data);
	}


}
