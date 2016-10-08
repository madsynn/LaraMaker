
<?php namespace Bosnadev\Models;

use Bosnadev\Observers\DepartmentObserver;

class Department extends \Eloquent
{
    protected $table = 'departments';

    protected $primaryKey = 'dept_no';

    public $timestamps = false;

    public static function table()
    {
        $model = new static;
        return $model->getTable();
    }

    public static function boot()
    {
        parent::boot();

        Department::observe(new DepartmentObserver());
    }
}