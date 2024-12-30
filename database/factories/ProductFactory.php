<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Eco-Friendly Water Bottle',
                'Wireless Noise-Cancelling Headphones',
                'Smart Home Security Camera',
                'Ergonomic Office Chair',
                'Portable Solar Charger',
                'Air Purifier with HEPA Filter',
                'Fitness Tracker Watch',
                'Compact Espresso Machine',
                'Foldable Electric Scooter',
                'Robotic Vacuum Cleaner',
                'Bluetooth Speaker with LED Lights',
                'Adjustable Standing Desk',
                'Cordless Stick Vacuum',
                'Digital Drawing Tablet',
                'Smart Wi-Fi Thermostat',
                'Portable Blender for Smoothies',
                'Wireless Charging Pad',
                'Indoor Herb Garden Kit',
                'Compact Projector for Home Cinema',
                'Ergonomic Vertical Mouse',
                'Smart Door Lock',
                'Collapsible Silicone Food Containers',
                'UV Phone Sanitizer',
                'Weighted Blanket for Better Sleep',
                'Portable Photo Printer',
                'Smart Wi-Fi Light Bulbs',
                'Foldable Drone with HD Camera',
                'Noise-Masking Sleep Buds',
                'Reusable Beeswax Food Wraps',
                'Compact Folding Electric Bike',
                'Smart Yoga Mat with Pose Correction',
                'Portable Espresso Maker',
                'Collapsible Reusable Straw Set',
                'Smart Plant Sensor and Watering System',
                'Noise-Cancelling Sleep Mask',
                'Foldable Solar Panel Charger',
                'Ergonomic Laptop Stand',
                'Smart Water Bottle with Hydration Tracking',
                'Portable UV-C Sterilizer Wand',
                'Compact Folding Treadmill',
                'Smart Posture Corrector',
                'Reusable Silicone Food Storage Bags',
                'Portable Air Quality Monitor',
                'Foldable Bluetooth Keyboard',
                'Smart Wake-Up Light Alarm Clock',
                'Compact Sous Vide Precision Cooker',
                'Portable Green Screen for Video Calls',
                'Smart Body Composition Scale',
                'Foldable Rain Jacket with Built-in Pouch',
                'Portable White Noise Machine'
            ]),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->numberBetween(5_00, 45_00),
        ];
    }
}
