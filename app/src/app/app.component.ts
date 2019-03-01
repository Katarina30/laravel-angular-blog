
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import{ UserService } from './services/user.service';
import { AuthenticateService } from './services/authenticate.service';
import { first } from 'rxjs/operators';
import {User} from './models/user';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {

    currentUser: User;

    users: User[] = [];

    constructor(
        private router: Router,
        private authenticationService: AuthenticateService,
        private User:UserService
       
    ) {
        this.authenticationService.currentUser.subscribe(x => this.currentUser = x);
    }

    logout() {
        this.authenticationService.logout();
        this.router.navigate(['/login']);
    }
    getUser(){
    	return this.User.getUser().pipe(first()).subscribe(users => {
           this.users = users;
        });
    }

}
