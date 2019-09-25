/**
 * Created by SHIPON on 9/24/2019.
 */
/* jshint node: true */
/*jshint esversion: 6 */
import Dashboard from './components/Dashboard.vue';
import Student from './components/student/Student.vue';
import Employee from './components/employee/Employee.vue';

export const routes = [
    {
        path: '/',
        component: Dashboard
    },

    {
        path: '/student',
        component: Student
    },

    {
        path: '/employee',
        component: Employee
    },
];