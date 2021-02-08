<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\ModelTraits;
use Illuminate\Support\Arr;

/**
 * Class Event
 * @package App\Models
 *
 * @property int $id
 *
 * @property int $aggregate_id
 * @property int $version
 *
 * @property int $created_time
 * @property int $updated_time
 *
 * @property Aggregate $aggregate
 * @property EventLog[] $eventLogs
 * @property EventSubscribe[] $eventSubscribes
 */
class Event extends Model
{
    use HasFactory;
    use ModelTraits;

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    public $perPage = 30;

    public $table = 'events';

    protected $keyType = 'string';

    public $incrementing = false;

    public $fillable = [
        'aggregate_id',
        'version',
    ];

    public function Aggregate()
    {
        return $this->belongsTo(Aggregate::class, 'aggregate_id', 'id');
    }

    public function EventLogs()
    {
        return $this->hasMany(EventLog::class, 'event_id', 'id');
    }

    public function EventSubscribes()
    {
        return $this->hasMany(EventSubscribe::class, 'event_id', 'id');
    }

    public static function icon()
    {
        return 'fas fa-bullhorn';
    }

    public static function attributesLabel()
    {
        return [
            'id' => 'ID',
            'aggregate_id' => 'Aggregate ID',
            'version' => 'Version',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }

    public function search(array $filter)
    {
        $query = self::query()->with(['aggregate', 'eventLogs', 'eventSubscribes']);

        if ($id = Arr::get($filter, 'id', '')) {
            $query->where('id', 'LIKE', '%' . $id . '%');
            // $query->where('id', $id);
        }

        if ($keyword = Arr::get($filter, 'keyword', '')) {
            // $query->where('id', 'LIKE', '%' . $keyword . '%');
        }

        if ($aggregateID = Arr::get($filter, 'aggregate_id', '')) {
            $query->where('aggregate_id', $aggregateID);
        }

        if ($version = Arr::get($filter, 'version', '')) {
            $query->where('version', $version);
        }

        return $query->paginate();
    }

    public function getAggregateName()
    {
        if ($this->aggregate) {
            return $this->aggregate->name;
        }

        return 'n/a';
    }
}
