<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class CourseStudentSeeder extends Seeder
{
    /**
     * Seed the application's database with sample courses and students.
     */
    public function run(): void
    {
        $courses = [
            [
                'code' => 'CS101',
                'name' => 'Computer Science',
                'duration_months' => 6,
                'instructor' => 'Dr. Alan Turing',
                'description' => 'Introduction to programming and computer science fundamentals.',
            ],
            [
                'code' => 'MATH201',
                'name' => 'Mathematics',
                'duration_months' => 4,
                'instructor' => 'Dr. Ada Lovelace',
                'description' => 'Core mathematics for science and engineering.',
            ],
            [
                'code' => 'PHY101',
                'name' => 'Physics',
                'duration_months' => 5,
                'instructor' => 'Prof. Marie Curie',
                'description' => 'Classical mechanics and thermodynamics.',
            ],
        ];

        foreach ($courses as $data) {
            Course::create($data);
        }

        $students = [
            [
                'student_id' => 'STU-001',
                'first_name' => 'Subham',
                'last_name' => 'Kundu',
                'email' => 'subham.kundu@email.com',
                'phone' => '0987654321',
                'address' => 'Siliguri, West Bengal, India',
                'status' => 'active',
                'course_id' => 1,
            ],
            [
                'student_id' => 'STU-002',
                'first_name' => 'Sagnik',
                'last_name' => 'Bhattacherjee',
                'email' => 'sagnik@example.com',
                'phone' => '1234567890',
                'address' => 'Kolkata, West Bengal, India',
                'status' => 'active',
                'course_id' => 2,
            ],
        ];

        foreach ($students as $data) {
            Student::create($data);
        }
    }
}
