<?php
namespace App\Entity\Api;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(type="object", schema="Api_StationRemote")
 */
class StationRemote
{
    /**
     * Mount/Remote ID number.
     *
     * @OA\Property(example=1)
     * @var int
     */
    public $id;

    /**
     * Mount point name/URL
     *
     * @OA\Property(example="/radio.mp3")
     * @var string
     */
    public $name;

    /**
     * Full listening URL specific to this mount
     *
     * @OA\Property(example="http://localhost:8000/radio.mp3")
     * @var string
     */
    public $url;

    /**
     * Bitrate (kbps) of the broadcasted audio (if known)
     *
     * @OA\Property(example=128)
     * @var int
     */
    public $bitrate;

    /**
     * Audio encoding format of broadcasted audio (if known)
     *
     * @OA\Property(example="mp3")
     * @var string
     */
    public $format;

    /**
     * Listener details
     *
     * @OA\Property
     * @var NowPlayingListeners
     */
    public $listeners;
}
