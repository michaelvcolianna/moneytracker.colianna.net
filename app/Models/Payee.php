<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @note Months are set in boot method.
     *
     * @var array
     */
    protected $attributes = [
        'active' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'amount',
        'start',
        'end',
        'active',
    ];

    /**
     * Create a new instance of the model.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set defaults for months
        foreach(config('app.months') as $key => $value)
        {
            $this->attributes[$key] = true;
        }

        // Set months as fillable
        $this->mergeFillable(array_keys(config('app.months')));
    }

    /**
     * Provides the validation rules.
     *
     * @param  string  $preface
     * @return array
     */
    public static function validationRules($preface = null)
    {
        $rules = [
            'payee.name' => 'required',
            'payee.amount' => 'nullable|integer',
            'payee.start' => 'nullable|integer|min:1|max:31',
            'payee.end' => 'nullable|integer|min:1|max:31',
            'payee.active' => 'nullable|boolean',
        ];

        // Set rules for the months
        foreach(config('app.months') as $key => $value)
        {
            $rules['payee.' . $key] = 'nullable|boolean';
        }

        return $rules;
    }

    /**
     * Get the entries for the payee.
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function noMonthsSelected()
    {
        $selected = 0;

        foreach(array_keys(config('app.months')) as $month)
        {
            $selected+= $this->$month;
        }

        return !(bool)$selected;
    }
}
