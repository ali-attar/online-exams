@php
    $permisions=array();
    $b=Auth::user()->permisionUser;
    foreach ($b as $index) {
        array_push($permisions,$index->permision->role_english);
    }
    //dd(in_array('addmin',$permisions));
@endphp