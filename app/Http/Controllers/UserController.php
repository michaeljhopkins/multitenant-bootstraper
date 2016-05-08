<?php namespace Multi\Http\Controllers;

use Multi\Http\Requests;
use Multi\Http\Requests\CreateUserRequest;
use Multi\Http\Requests\UpdateUserRequest;
use Multi\Services\UserService;
use Multi\Http\Controllers\Controller as BaseController;
use Flash;

class UserController extends BaseController
{

    /**
     * @var  UserService
     */
    private $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the User.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userService->paginate(10);

        return view('users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userService->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->exist($id);

        return view('users.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->exist($id);

        return view('users.edit')->with(compact('user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $this->exist($id);

        $this->userService->update($id, $request->all());

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->userService->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    /**
     * check if a record exist
     *
     * @param  int $id
     * @return Eloquent
     */
    private function exist($id)
    {
        try {
            $user = $this->userService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return $user;
    }
}
