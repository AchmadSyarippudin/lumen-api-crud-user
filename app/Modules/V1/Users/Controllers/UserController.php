<?php

namespace App\Modules\V1\Users\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\V1\Users\Models\User;

class UserController extends Controller
{
   
    public function simpan(Request $request)
    { 
        $nama           = $request->input('nama');
        $jk             = $request->input('jk');
        $tgl_lahir      = $request->input('tgl_lahir');
        $alamat         = $request->input('alamat');
        $no_hp          = $request->input('no_hp');

        // validasi cek field tidak boleh kosong
        if(empty($nama) | empty($jk) | empty($tgl_lahir) | empty($alamat) | empty($no_hp))
        {
            $response = [
                'status'    => 400,
                'message'   => 'Failed, parameter tidak boleh kosong',
                'data'      => json_decode ("{}"),
            ];
            return response()->json($response, $response['status']);
        }
        
        try {
            // simpan data 
            $simpan                     = new User;
            $simpan->nama               = $nama;
            $simpan->jk                 = $jk;
            $simpan->tgl_lahir          = $tgl_lahir;
            $simpan->alamat             = $alamat;
            $simpan->no_hp              = $no_hp;
            $simpan->save();
            
            $response = [
                'status'    => 201,
                'message'   => 'Success, data berhasil disimpan',
                'data'      => $request->all(),
            ];

            return response()->json($response, $response['status']);
       
        } catch (\Throwable $th) {
           // jika ada error saat simpan kode ini di eksekusi 
            $response = [
                'status'    => 500,
                'message'   => $th,
                'data'      => json_decode ("{}"),
            ];

            return response()->json($response, $response['status']); 

        }

    }

    public function all()
    {
        $users =  User::all();
        
        if(count($users) > 0 )
        {
            $response = [
                'status'    => 200,
                'message'   => 'Success',
                'data'      => $users,
            ];

            
        } else {

            $response = [
                'status'    => 204,
                'message'   => 'Tidak ada data',
                'data'      => json_decode ("[]"),
            ]; 
        }

        return response()->json($response);

    }

    public function update(Request $request, $id)
    {   
        //cek user dengan id yang dikirim ada apa tidak 
        $cekUser = User::where('id', $id)->first();
        
        //validasi jika data user ada, update data 
        if(!empty($cekUser))
        {   
            try {
                
                $update  = User::where('id', $id)
                    ->update([
                        'nama'          => $request->nama,
                        'jk'            => $request->jk,
                        'tgl_lahir'     => $request->tgl_lahir,
                        'alamat'        => $request->alamat,
                        'no_hp'         => $request->no_hp
                    ]);    

                $response = [
                    'status'    => 200,
                    'message'   => 'Sukses update data',
                    'data'      => $request->all(),
                ];

                return response()->json($response, $response['status']);
            } catch (\Throwable $th) {
                
                $response = [
                    'status'    => 500,
                    'message'   => $th,
                    'data'      => json_decode ("{}"),
                ];
    
                return response()->json($response, $response['status']);  
            }
            
        }
        //jika data user tidak ada  
        else {
            $response = [
                'status'    => 204,
                'message'   => 'Data tidak ditemukan',
                'data'      => json_decode("{}"),
            ];
            return response()->json($response);
        }  
    }

    public function delete($id)
    {
        $delete = User::where('id', $id)->delete();

        if($delete)
        {
            $response = [
                'status'    => 200,
                'message'   => 'Berhasil delete data',
                'data'      => json_decode("{}"),
            ];
        } else {

            $response = [
                'status'    => 204,
                'message'   => 'Data tidak ditemukan',
                'data'      => json_decode("{}"),
            ];
        }

        return response()->json($response);
    }
}
