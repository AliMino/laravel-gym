
laravel-permission        https://github.com/spatie/laravel-permission
JWT API authentication    composer require tymon/jwt-auth:^1.0@dev
Strip                     https://cartalyst.com/manual/stripe/2.0
Ban                       https://github.com/cybercog/laravel-ban

admin
    * one admin     admin@admin.com     123456
    * all permissions granted
    * laravel seeders
    * the ability to create new admins from command line
city manager
    * CRUD and ban/unban on gym managers and gyms in his city
    * 



links                               admin   city manager    gym manager     view
    * Gym Managers                  *   |   *           |               |
    * City Managers                 *   |               |               |
    * Users​                         *   |   *           |   *           |
    * Cities                        *   |               |               |
    * Gyms                          *   |   *           |   *           |
    * Training Packages             *   |   *           |   *           |
    * Coaches                       *   |   *           |   *           |
    * Attendance                    *   |   *           |   *           |
    * Buy Package For User          *   |   *           |   *           |
    * Revenue​                       *   |               |               |

tables
    * gym_managers      (name, email(unique), password(6chars or more), national_id(unique), avatar_image(jpg/jpeg, default), is_banned)
    * city_managers     (name, email(unique), password(6chars or more), national_id(unique), avatar_image(jpg/jpeg, default))
    * training_packages (name, current_price(in cents), sessions_number, gym_id)
    * gyms              (name, created_at(date only - ** SEE Mutator **), cover_image, city_id)

relationships
    * one gum has many gym managers