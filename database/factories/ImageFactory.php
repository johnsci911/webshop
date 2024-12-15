<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->unique()->randomElement([
                'media/image1.png',
                'media/image2.png',
                'media/image3.png',
                'media/image4.png',
                'media/image5.png',
                'media/image6.png',
                'media/image7.png',
                'media/image8.png',
                'media/image9.png',
                'media/image10.png',
                'media/image11.png',
                'media/image12.png',
            ]),
        ];
    }
}
