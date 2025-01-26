<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Accomodation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "accomodations";

    protected $fillable =[
        'created_by_user_id',
        'status',
        'type',
        'qty',
        'capacity',
        'amount',
        'image',
        'description'
    ];


    public static function createAccomodation($data)
    {
        $payload = self::create([
            'created_by_user_id' => Auth::user()->id ?? 0,
            'status' => $data['status'],
            'type' => $data['type'],
            'qty' => $data['qty'],
            'capacity' => $data['capacity'],
            'amount' => $data['amount'] ?? '0',
            'image'         => $data['image'] ?? null,
            'description'   => $data['description'] ?? ''
        ]);

        return $payload;
    }

    public static function getAccomodation()
    {
        return self::orderBy('created_at','DESC')->get();
    }

    public static function getAccomodationById($id)
    {
        return self::findOrFail($id);
    }

    public static function updateAccomodation($id, $data)
    {
        $payload = self::findOrFail($id);
        
        $payload->update([
            'created_by_user_id' => Auth::user()->id ?? 0,
            'status' => $data['status'],
            'type' => $data['type'],
            'qty' => $data['qty'],
            'capacity' => $data['capacity'],
            'amount' => $data['amount'] ?? '0',
            'image'         => $data['image'] ?? null,
            'description'   => $data['description'] ?? ''
        ]);

        return $payload;
    }

    public static function deleteAccomodation($id)
    {
        return self::findOrFail($id)->delete();
    }
}
