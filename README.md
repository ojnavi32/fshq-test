# Ivanjo Sarmiento FSHQ Test Project

I use Laravel Framework for this project

Laravel is a web application framework with expressive, elegant syntax. I believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

#### Completed tasks
- Laravel auth without register
- Database seeding and factory for tables user, employee, company and roles & permission
- CRUD functionality for employee and company
- Company logo saves on storage/public folder
- Used migrations for database schema
- Employee and admin can login with password as password
- Admin has only the permission to add, edit, delete an employee or a company
- Used validation request on store/update functions
- Used datatables to display list of employees/companies
- Added a buttons on datatables for export csv, xlsx
- Email notification: triggers when a company has been created
- Scheduled email
- Used adminlte template for frontend design

#### Not completed tasks
- Notification of employees
- Country field on company/employee

##### Notes
- I did make some changes on the employee schema. I did used the users table to save firstname, lastname, email and password instead of putting it on the employees table. I just added a foreign key on employees table for user id.


Copyright (C) Ivanjo Sarmiento - 2020