<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represent a user's profile pictures.
 * 
 * @property integer     $total_count Total number of profile pictures the target user has
 * @property PhotoSize[] $photos      Requested profile pictures (in up to 4 sizes each)
 * 
 * @method integer     totalCount()
 * @method PhotoSize[] photos()
 * 
 * @method static setTotalCount(integer $totalCount)
 * @method static setPhotos(PhotoSize[] $photos)
 * 
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends baseType
{
    protected array $fields = [
        'total_count' => 'integer',
        'photos'      => [PhotoSize::class],
    ];
}
