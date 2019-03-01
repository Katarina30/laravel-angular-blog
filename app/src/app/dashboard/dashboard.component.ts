import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import{ UserService } from '../services/user.service';
import { AuthenticateService } from '../services/authenticate.service';
import { first } from 'rxjs/operators';
import {User} from '../models/user';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

	 currentUser: User;

    users: User[] = [];

  constructor( private router: Router,
        private authenticationService: AuthenticateService,
        private User:UserService
        ) { 
  	
  	 this.authenticationService.currentUser.subscribe(x => this.currentUser = x);

  }

  ngOnInit() {
  }

   getUser(){
    	return this.User.getUser().pipe(first()).subscribe(users => {
           this.users = users;
        });
    }
}
