<?php

namespace App\Filament\Resources\SiswaResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\SiswaResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\SiswaResource\Api\Transformers\SiswaTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = SiswaResource::class;
    public static bool $public = true;


    /**
     * Show Siswa
     *
     * @param Request $request
     * @return SiswaTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new SiswaTransformer($query);
    }
}
