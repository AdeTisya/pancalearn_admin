<?php
namespace App\Filament\Resources\SiswaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\SiswaResource;
use App\Filament\Resources\SiswaResource\Api\Requests\UpdateSiswaRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = SiswaResource::class;
    public static bool $public = true;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Siswa
     *
     * @param UpdateSiswaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateSiswaRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}