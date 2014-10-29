<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function home()
	{
		return View::make('pages.home');
	}

	public function error404()
	{
		return View::make('errors.missing-404');
	}

	public function address(){
		return View::make('pages.address');
	}

	public function about(){
		return View::make('pages.about');
	}

	public function contactForm(){
		return View::make('pages.contact');
	}
}
