<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\ModelTraits;
use Illuminate\Support\Arr;

/**
 * Class Aggregate
 * @package App\Models
 *
 * @property int $id
 *
 * @property int $source_id
 * @property string $name
 * @property string $description
 *
 * @property int $created_time
 * @property int $updated_time
 *
 *
 * @property Event[] $events
 */
class Aggregate extends Model
{
    use HasFactory;
    use ModelTraits;

    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    public $perPage = 30;

    public $table = 'aggregates';

    public $fillable = [
        'source_id',
        'name',
        'description',
    ];

    public function Events()
    {
        return $this->hasMany(Event::class, 'aggregate_id', 'id');
    }

    public static function icon()
    {
        return 'fas fa-database';
    }

    public static function attributesLabel()
    {
        return [
            'id' => 'ID',
            'source_id' => 'Source ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }

    public function search(array $filter)
    {
        $query = self::query()->with('events');

        if ($keyword = Arr::get($filter, 'keyword', '')) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        if ($sourceID = Arr::get($filter, 'source_id', '')) {
            $query->where('source_id', $sourceID);
        }

        return $query->paginate();
    }

    public static function dropdownListData($addAll = false)
    {

        $data = self::all()->pluck('name', 'id');

        if (!empty($addAll)) {
            $data->prepend($addAll, '');
        }

        return $data;
    }
}
