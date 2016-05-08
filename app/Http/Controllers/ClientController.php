<?php namespace Multi\Http\Controllers;

use Multi\Http\Requests;
use Multi\Http\Requests\CreateClientRequest;
use Multi\Http\Requests\UpdateClientRequest;
use Multi\Services\ClientService;
use Multi\Http\Controllers\Controller as BaseController;
use Flash;

class ClientController extends BaseController
{

    /**
     * @var  ClientService
     */
    private $clientService;

    function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the Client.
     *
     * @return Response
     */
    public function index()
    {
        $clients = $this->clientService->paginate(10);

        return view('clients.index')->with(compact('clients'));
    }

    /**
     * Show the form for creating a new Client.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param CreateClientRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();

        $client = $this->clientService->create($input);

        Flash::success('Client saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $client = $this->exist($id);

        return view('clients.show')->with(compact('client'));
    }

    /**
     * Show the form for editing the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $client = $this->exist($id);

        return view('clients.edit')->with(compact('client'));
    }

    /**
     * Update the specified Client in storage.
     *
     * @param int $id
     * @param UpdateClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequest $request)
    {
        $this->exist($id);

        $this->clientService->update($id, $request->all());

        Flash::success('Client updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->clientService->delete($id);

        Flash::success('Client deleted successfully.');

        return redirect(route('clients.index'));
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
            $client = $this->clientService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return $client;
    }
}
