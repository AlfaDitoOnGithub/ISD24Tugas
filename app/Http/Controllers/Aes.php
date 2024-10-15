<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;

class Aes extends Controller
{
    public function encryptAes(Request $request){
            // Define cipher
            $cipher = "aes-256-cbc";

            // Generate a 256-bit encryption key
            $encryption_key = openssl_random_pseudo_bytes(32);

            // Generate an initialization vector
            $iv_size = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($iv_size);

            // Data to encrypt
            
            $encrypted_data = [
                'First Name' => openssl_encrypt($request->first_name, $data, $cipher, $encryption_key, 0, $iv),
                'Last Name' => openssl_encrypt($request->last_name, $data, $cipher, $encryption_key, 0, $iv),
                'Company' => openssl_encrypt($request->company, $data, $cipher, $encryption_key, 0, $iv),
                'Phone Number' => openssl_encrypt($request->phone, $data, $cipher, $encryption_key, 0, $iv),
                'Email Address' => openssl_encrypt($request->email, $data, $cipher, $encryption_key, 0, $iv),
                'Foto KTP' => $request->file('foto')->encryptAes('foto'),
                'Video' => $request->file('video')->encryptAes('video'),
            ];

            Upload::create([
                'First Name' => $encrypted_data['First Name'],
                'Last Name' => $encrypted_data['Last Name'],
                'Company' => $encrypted_data['Company'],
                'Phone Number' => $encrypted_data['Phone Number'],
                'Email Address' => $encrypted_data['Email Address'],
                'Foto KTP' => $encrypted_data['Foto KTP'],
                'Video' => $encrypted_data['Video']
            ]);

            // Decrypt data
            $decrypted_data = [
                'First Name' => openssl_decrypt($encrypted_data['First Name'], $cipher, $encryption_key, 0, $iv),
                'Last Name' => openssl_decrypt($encrypted_data['Last Name'], $cipher, $encryption_key, 0, $iv),
                'Company' => openssl_decrypt($encrypted_data['Company'], $cipher, $encryption_key, 0, $iv),
                'Phone Number' => openssl_decrypt($encrypted_data['Phone Number'], $cipher, $encryption_key, 0, $iv),
                'Email Address' => openssl_decrypt($encrypted_data['Email Address'], $cipher, $encryption_key, 0, $iv),
                'Foto KTP' => $encrypted_data['Foto KTP'],
                'Video' => $encrypted_data['Video'],
            ];

            // Display decrypted text
            return view('isd', compact('decrypted_data'));
    }
}