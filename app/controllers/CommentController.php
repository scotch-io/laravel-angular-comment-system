<?php

class CommentController extends \BaseController {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Comment::get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Check if input values are available, else return error
+		if ( ! Input::has('author') || ! Input::has('text')) {
+			return Response::json(array('error' => 'Please fill the form properly.' ));
+		}
		Comment::create(array(
			'author' => Input::get('author'),
			'text' => Input::get('text')
		));

		return Response::json(array('success' => true));
	}

	/**
	 * Return the specified resource using JSON
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Comment::find($id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);

		return Response::json(array('success' => true));
	}

}
