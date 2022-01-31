<?php

namespace App\Controllers;

class Data extends BaseController
{
    protected $client;
    protected $request;

    public function __construct()
    {
        $this->client = service('curlrequest');
    }
    public function index()
    {
        return view('input');
    }
    public function input()
    {
        return view('input');
    }

    public function output()
    {
        $response = $this->client->request('GET', 'http://localhost:8081/nomor');
        // dd($response->getBody());
        $result['data'] = json_decode($response->getBody(), true);
        return view('output', $result);
    }

    public function create()
    {
        $data = [
            'no_hp' => $this->request->getVar('no_hp'),
            'provider' => $this->request->getVar('provider')
        ];

        $response = $this->client->request('POST', 'http://localhost:8081/nomor', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody(), true);

        if ($result) {
            return view('input');
        }
    }

    public function update($id)
    {
        $response = $this->client->request('GET', 'http://localhost:8081/nomor/' . $id);

        $result['data'] = json_decode($response->getBody(), true);
        // dd($result['data']);

        return view('update', $result['data'][0]);
    }

    public function edit($id)
    {
        $data = [
            'no_hp' => $this->request->getVar('no_hp'),
            'provider' => $this->request->getVar('provider')
        ];

        $response = $this->client->request('PUT', 'http://localhost:8081/nomor/' . $id, [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody(), true);

        if ($result) {
            return redirect()->to('data/output');
        }
    }

    public function delete($id)
    {
        $response = $this->client->request('DELETE', 'http://localhost:8081/nomor/' . $id);
        $result = json_decode($response->getBody(), true);

        if ($result) {
            return redirect()->to('data/output');
        }
    }
}
