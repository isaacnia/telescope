<?php

namespace Laravel\Telescope\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\Storage\EntryModel;

class EntryModelFactory extends Factory
{
    /**
     * Get the name of the model that is generated by the factory.
     *
     * @return string
     */
    public function modelName()
    {
        return EntryModel::class;
    }

    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return [
            'sequence' => random_int(1, 10000),
            'uuid' => fake()->uuid(),
            'batch_id' => fake()->uuid(),
            'type' => fake()->randomElement([
                EntryType::CACHE, EntryType::CLIENT_REQUEST, EntryType::COMMAND, EntryType::DUMP, EntryType::EVENT,
                EntryType::EXCEPTION, EntryType::JOB, EntryType::LOG, EntryType::MAIL, EntryType::MODEL,
                EntryType::NOTIFICATION, EntryType::QUERY, EntryType::REDIS, EntryType::REQUEST,
                EntryType::SCHEDULED_TASK,
            ]),
            'content' => [fake()->word() => fake()->word()],
        ];
    }
}
