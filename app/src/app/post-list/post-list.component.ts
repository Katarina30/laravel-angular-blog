import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';
import{ UserService } from '../services/user.service';
import { AuthenticateService } from '../services/authenticate.service';
import{ PostService } from '../services/post.service';
import {User} from '../models/user';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  styleUrls: ['./post-list.component.css']
})
export class PostListComponent implements OnInit {

  currentUser: User;
  users: User[] = [];
	
	post = [];

  constructor(private http:HttpClient, 
              private route: ActivatedRoute,
              private Posts: PostService,
              private User: UserService,
              private authenticationService: AuthenticateService) { 

    this.authenticationService.currentUser.subscribe(x => this.currentUser = x);
  }

  ngOnInit() {
    let id = +this.route.snapshot.paramMap.get('id');
  	this.Posts.getPostById(id).subscribe(data=>{ this.post = data});
   
  }
   getUser(){
      return this.User.getUser().pipe(first()).subscribe(users => {
           this.users = users;
        });
    }

}

