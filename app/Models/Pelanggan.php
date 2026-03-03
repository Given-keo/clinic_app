<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $appends = ['usia'];

    protected $fillable = [
        'nomor_pasien',
        'nama_pasien',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->nomor_pasien) {
                $model->nomor_pasien = self::generateNomorPasien();
            }
        });
    }

    public static function generateNomorPasien()
    {
        $tahun = date('Y');
        $prefix = 'PSN-' . $tahun . '-';

        $lastRecord = self::where('nomor_pasien', 'LIKE', $prefix . '%')
            ->orderBy('nomor_pasien', 'desc')
            ->first();

        if (!$lastRecord) {
            $number = '0001';
        } else {
            $lastNumber = (int) substr($lastRecord->nomor_pasien, -4);
            $number = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        }

        return $prefix . $number;
    }

    public function getUsiaAttribute()
    {
        if (!$this->tanggal_lahir) {
            return "-";
        }

        $birthDate = Carbon::parse($this->tanggal_lahir);
        $now = Carbon::now();

        $years = (int) $birthDate->diffInYears($now);
        $months = (int) ($birthDate->diffInMonths($now) % 12);

        return "{$years} tahun {$months} bulan";
    }
}