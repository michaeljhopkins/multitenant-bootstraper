<?php namespace Multi\Http\Controllers;

use Multi\Http\Requests;
use Multi\Http\Requests\CreateTenantRequest;
use Multi\Http\Requests\UpdateTenantRequest;
use Multi\Services\TenantService;
use Multi\Http\Controllers\Controller as BaseController;
use Flash;

class TenantController extends BaseController
{

    /**
     * @var  TenantService
     */
    private $tenantService;

    function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    /**
     * Display a listing of the Tenant.
     *
     * @return Response
     */
    public function index()
    {
        $tenants = $this->tenantService->paginate(10);

        return view('tenants.index')->with(compact('tenants'));
    }

    /**
     * Show the form for creating a new Tenant.
     *
     * @return Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created Tenant in storage.
     *
     * @param CreateTenantRequest $request
     *
     * @return Response
     */
    public function store(CreateTenantRequest $request)
    {
        $input = $request->all();

        $tenant = $this->tenantService->create($input);

        Flash::success('Tenant saved successfully.');

        return redirect(route('tenants.index'));
    }

    /**
     * Display the specified Tenant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tenant = $this->exist($id);

        return view('tenants.show')->with(compact('tenant'));
    }

    /**
     * Show the form for editing the specified Tenant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tenant = $this->exist($id);

        return view('tenants.edit')->with(compact('tenant'));
    }

    /**
     * Update the specified Tenant in storage.
     *
     * @param int $id
     * @param UpdateTenantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTenantRequest $request)
    {
        $this->exist($id);

        $this->tenantService->update($id, $request->all());

        Flash::success('Tenant updated successfully.');

        return redirect(route('tenants.index'));
    }

    /**
     * Remove the specified Tenant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->tenantService->delete($id);

        Flash::success('Tenant deleted successfully.');

        return redirect(route('tenants.index'));
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
            $tenant = $this->tenantService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Tenant not found');

            return redirect(route('tenants.index'));
        }

        return $tenant;
    }
}
