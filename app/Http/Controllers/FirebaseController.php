<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://appointment-sys-3fb2e-default-rtdb.firebaseio.com/')
            ->create();
    
        $database = $firebase->getDatabase();
        $ref = $database->getReference('doctors');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'Name'=>'Dr. Mubashir',
            'Speciality'=>'Child Specialist'
        ]);
        return $key;
    
    }
}
