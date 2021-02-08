<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\ModelTraits;
use Illuminate\Support\Arr;

/**
 * Class EventSubscribe
 * @package App\Models
 *
 * @property int $id
 *
 * @property int $event_id
 * @property int $source_id
 *
 * @property int $created_time
 * @property int $updated_time
 */
class EventSubscribe extends Model
{
    use HasFactory;
    use ModelTraits;

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    public $perPage = 30;

    public $table = 'event_subscribe';

    public $fillable = [
        'event_id',
        'source_id',
    ];

    public static function icon(){
        return 'fas fa-bell';
    }

    public static function attributesLabel()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'source_id' => 'Source ID',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }

    public function search(array $filter)
    {
        $query = self::query();

        if ($keyword = Arr::get($filter, 'keyword', '')) {
            $query->where('id', 'LIKE', '%' . $keyword . '%');
        }

        if ($eventID = Arr::get($filter, 'event_id', '')) {
            $query->where('event_id', $eventID);
        }

        if ($sourceID = Arr::get($filter, 'source_id', '')) {
            $query->where('source_id', $sourceID);
        }

        return $query->paginate();
    }
}
