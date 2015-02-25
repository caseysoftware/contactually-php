<?php

namespace Contactually;

class Tasks extends \Contactually\Resources\Base
{
    protected $resource = 'tasks';
    protected $dataname = 'tasks';

    public function ignore($temporary = false)
    {
        $parameters = array('temp' => $temporary, 'task_id' => $task_id);

        $results = $this->client->post($this->resource . '/' . $this->id . '/ignore.json', $parameters);

        return $results;
    }

    public function snooze($days = 7)
    {
        $parameters = array('days' => $days, 'task_id' => $task_id);

        $results = $this->client->post($this->resource . '/' . $this->id . '/snooze.json', $parameters);

        return $results;
    }
}