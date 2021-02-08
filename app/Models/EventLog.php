<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\ModelTraits;
use Illuminate\Support\Arr;

/**
 * Class EventLog
 * @package App\Models
 *
 * @property int $id
 *
 * @property int $aggregate_id
 * @property int $event_id
 * @property int $version
 * @property string $payload
 * @property int $shipped
 *
 * @property int $created_time
 * @property int $updated_time
 *
 * @property Aggregate $aggregate
 * @property Event $event
 */
class EventLog extends Model
{
    use HasFactory;
    use ModelTraits;

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    const SHIPPED_NO = 0;
    const SHIPPED_YES = 1;

    public $perPage = 30;

    public $table = 'event_logs';

    public $fillable = [
        'aggregate_id',
        'event_id',
        'version',
        'payload',
        'shipped',
    ];

    public function Aggregate()
    {
        return $this->belongsTo(Aggregate::class, 'aggregate_id', 'id');
    }

    public function Event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public static function icon()
    {
        return 'fas fa-history';
    }

    public static function attributesLabel()
    {
        return [
            'id' => 'ID',
            'aggregate_id' => 'Aggregate ID',
            'event_id' => 'Event ID',
            'version' => 'Version',
            'payload' => 'Payload',
            'shipped' => 'Shipped',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }

    public function search(array $filter)
    {
        $query = self::query()->with(['aggregate']);

        if ($id = Arr::get($filter, 'id', '')) {
            $query->where('id', $id);
        }

        if ($aggregateID = Arr::get($filter, 'aggregate_id', '')) {
            $query->where('aggregate_id', $aggregateID);
        }

        if ($eventID = Arr::get($filter, 'event_id', '')) {
            $query->where('event_id', $eventID);
        }

        if ($version = Arr::get($filter, 'version', '')) {
            $query->where('version', $version);
        }

        $shipped = Arr::get($filter, 'shipped', '');
        if (strlen($shipped) > 0) {
            $query->where('shipped', $shipped);
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

    public static function dropdownShippedList($addAll = false)
    {

        $data = collect([
            self::SHIPPED_YES => __('Yes'),
            self::SHIPPED_NO => __('No'),
        ]);

        if (!empty($addAll)) {
            $data->prepend($addAll, '');
        }

        return $data;
    }

    public function getShippedText()
    {
        return Arr::get(self::dropdownShippedList(), $this->shipped, 'n/a');
    }

    public function formatShippedHtml()
    {

        if ($this->shipped === self::SHIPPED_YES) {
            return '<span class="fas fa-check text-success"></span>';
        }

        return '<span class="fas fa-times text-secondary"></span>';
    }
}
