<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\Models\RealStatePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealStatePhotoController extends Controller
{
    private $realStatePhoto;

    /**
     * @param RealStatePhoto $realStatePhoto
     */
    public function __construct(RealStatePhoto $realStatePhoto)
    {
        $this->realStatePhoto = $realStatePhoto;
    }

    public function setThumb($photoId, $realStateID)
    {
        try {

            $photo = $this->realStatePhoto
                ->where('real_state_id', $realStateID)
                ->where('is_thumb', true);

            if ($photo->count()) {
                $photo->first()->update([
                    'is_thumb' => false
                ]);
            }
            $photo = $this->realStatePhoto->find($photoId);
            $photo->update([
                'is_thumb' => true
            ]);

            return response()->json([
                'data' => [
                    'msg' => 'Thumb Atualizado com Sucesso'
                ]
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function remove($photoId)
    {
        try {
            $photo = $this->realStatePhoto->find($photoId);

            if ($photo->is_thumb) {
                $message = new ApiMessages("Foto é a Thumb, não é possivel deletar!");
                return response()->json($message->getMessage(), 401);
            }

            if ($photo) {
                Storage::disk('public')->delete($photo->photo);
                $photo->delete();
            }

            return response()->json([
                'data' => [
                    'msg' => 'Foto removida com Sucesso'
                ]
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }


}
