<?php namespace Multistarter\Http\Controllers;

use Multistarter\Http\Requests;
use Multistarter\Http\Requests\CreatePermissionRequest;
use Multistarter\Http\Requests\UpdatePermissionRequest;
use Multistarter\Services\PermissionService;
use Multistarter\Http\Controllers\Controller as BaseController;
use Flash;

class PermissionController extends BaseController
{

    /**
     * @var  PermissionService
     */
    private $permissionService;

    function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the Permission.
     *
     * @return Response
     */
    public function index()
    {
        $permissions = $this->permissionService->paginate(10);

        return view('permissions.index')->with(compact('permissions'));
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->all();

        $permission = $this->permissionService->create($input);

        Flash::success('Permission saved successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->exist($id);

        return view('permissions.show')->with(compact('permission'));
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->exist($id);

        return view('permissions.edit')->with(compact('permission'));
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param int $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $this->exist($id);

        $this->permissionService->update($id, $request->all());

        Flash::success('Permission updated successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->permissionService->delete($id);

        Flash::success('Permission deleted successfully.');

        return redirect(route('permissions.index'));
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
            $permission = $this->permissionService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return $permission;
    }
}
