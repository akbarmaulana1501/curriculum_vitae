<?php

namespace Database\Seeders;

use App\Models\{Experience, Profile, Project, Skill, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@portfolio.test'], ['name' => 'Administrator', 'password' => Hash::make('password')]);
        Profile::updateOrCreate(['id' => 1], ['name' => 'Raka Pratama', 'headline' => 'Digital Product Designer & Front-end Developer', 'location' => 'Jakarta, Indonesia', 'email' => 'hello@rakapratama.dev', 'about' => 'Saya merancang pengalaman digital yang sederhana, berguna, dan berkesan. Berpengalaman membangun produk web dari konsep hingga siap digunakan.']);
        Experience::updateOrCreate(['role' => 'Senior Product Designer'], ['company' => 'Nusantara Studio', 'location' => 'Jakarta, Indonesia', 'period' => '2022 — Sekarang', 'description' => 'Memimpin desain produk dan membangun design system untuk produk B2B.', 'sort_order' => 1]);
        Project::updateOrCreate(['title' => 'Finly Dashboard'], ['category' => 'Fintech · Web App', 'description' => 'Dashboard keuangan yang membantu bisnis memantau arus kas dengan lebih jelas.', 'technologies' => 'Figma, Laravel, Vue', 'url' => 'https://example.com', 'sort_order' => 1]);
        foreach ([['Product Design', 'Design', 90], ['UI/UX & Prototyping', 'Design', 92], ['HTML / CSS', 'Development', 88], ['Laravel', 'Development', 80]] as $i => $data) Skill::updateOrCreate(['name' => $data[0]], ['category' => $data[1], 'level' => $data[2], 'sort_order' => $i + 1]);
        Profile::where('id', 1)->update(['name' => 'Akbar Maulana', 'headline' => 'Fullstack Developer', 'location' => 'Pekanbaru, Indonesia', 'email' => 'akbarmaulana.am826@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/akbar-maulana-0b6705292', 'about' => 'Back-end Developer enthusiast with experience designing and building web applications using Laravel, CodeIgniter, and MySQL. Skilled in backend development, database management, API integration, and DevOps fundamentals.', 'education' => 'Politeknik Caltex Riau | Bachelor’s Degree in Information Technology | October 2021 - October 2025 | Pekanbaru, Indonesia', 'strengths' => 'Collaborative teamwork, strong communication, problem-solving, and analytical thinking.', 'achievement' => 'Successfully developed a Tuberculosis Information System integrated with the Indonesian Ministry of Health API through collaboration with USAID.']);
        Experience::updateOrCreate(['role' => 'Programmer (Intern)'], ['company' => 'PT Bakti Timah Medika', 'location' => 'Pangkalpinang, Indonesia', 'period' => 'February 2024 - July 2024', 'description' => 'Developed a Tuberculosis Information System for managing patient data, integrated government APIs, participated in user testing, and collaborated across teams. Technologies: Laravel, MySQL, REST API, Git, Docker.', 'sort_order' => 1]);
        foreach ([['Tuberculosis Information System', 'Healthcare Web App', 'Application for TB patient data management integrated with the Ministry of Health API.', 'Laravel, MySQL, REST API'], ['Point of Sale System', 'Retail Web App', 'Personal retail management project including inventory and sales reporting.', 'Laravel, Vue.js'], ['Employee Payroll System', 'Payroll Web App', 'Payroll management system for PT Bakti Timah Medika.', 'CodeIgniter 3, MySQL'], ['Decision Support System', 'Business Web App', 'Application that assists decision-making processes for PT Sinarmas.', 'CodeIgniter 3'], ['Company Profit Monitoring System', 'Analytics Web App', 'System for tracking and analyzing company profits.', 'Laravel 8, MySQL'], ['Boarding House Management System', 'Desktop Application', 'Boarding house operation manager for tenants, rooms, payments, and reports.', 'Java Swing, JDBC, MySQL']] as $i => $data) Project::updateOrCreate(['title' => $data[0]], ['category' => $data[1], 'description' => $data[2], 'technologies' => $data[3], 'sort_order' => $i + 1]);
        foreach ([['CodeIgniter', 'Backend', 85], ['Git & GitHub', 'Tools', 85], ['JavaScript', 'Frontend', 75], ['Laravel', 'Backend', 90], ['Linux Server', 'DevOps', 70], ['PHP', 'Backend', 90], ['REST API', 'Backend', 85], ['Python', 'Programming', 65], ['Java', 'Programming', 65], ['MySQL', 'Database', 88]] as $i => $data) Skill::updateOrCreate(['name' => $data[0]], ['category' => $data[1], 'level' => $data[2], 'sort_order' => $i + 1]);
    }
}
