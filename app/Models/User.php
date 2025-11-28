<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Поля, які можна масово заповнювати
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Поля, які приховуються при серіалізації
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Касти типів
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * ========= ЗВ'ЯЗКИ =========
     */

    // Користувач є власником багатьох проєктів (поле owner_id в projects)
    public function ownedProjects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }

    // Користувач бере участь у багатьох проєктах через pivot-таблицю project_user
    public function projects()
    {
        return $this->belongsToMany(Project::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    // Користувач створює задачі (author_id в tasks)
    public function authoredTasks()
    {
        return $this->hasMany(Task::class, 'author_id');
    }

    // Користувач призначений виконавцем задач (assignee_id в tasks)
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assignee_id');
    }

    // Користувач залишає коментарі (author_id в comments)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }
}