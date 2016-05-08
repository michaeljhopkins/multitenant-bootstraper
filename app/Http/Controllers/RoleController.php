<?php namespace Multi\Http\Controllers;

use Multi\Http\Requests;
use Multi\Http\Requests\CreateRoleRequest;
use Multi\Http\Requests\UpdateRoleRequest;
use Multi\Services\RoleService;
use Multi\Http\Controllers\Controller as BaseController;
use Flash;

class RoleController extends BaseController
{

    /**
     * @var  RoleService
     */
    private $roleService;

    function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the Role.
     *
     * @return Response
     */
    public function index()
    {
        $roles = $this->roleService->paginate(10);

        return view('roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleService->create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->exist($id);

        return view('roles.show')->with(compact('role'));
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->exist($id);

        return view('roles.edit')->with(compact('role'));
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $this->exist($id);

        $this->roleService->update($id, $request->all());

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->roleService->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
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
            $role = $this->roleService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return $role;
    }
}
