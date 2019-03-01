import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http'; 
import{ UserService } from '../services/user.service';
import { AuthenticateService } from '../services/authenticate.service';
import{ PostService } from '../services/post.service';
import {User} from '../models/user';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-posts',
  templateUrl: './posts.component.html',
  styleUrls: ['./posts.component.css']
})
export class PostsComponent implements OnInit {

currentUser: User;
  users: User[] = [];
	
	posts = [];

  constructor(private http: HttpClient,
               private Posts: PostService,
              private User: UserService,
              private authenticationService: AuthenticateService) { 
       this.authenticationService.currentUser.subscribe(x => this.currentUser = x);
  }

  ngOnInit() {
  	this.Posts.getPosts().subscribe(data=>{ 
      this.posts = data;
    });
  }

   getUser(){
      return this.User.getUser().pipe(first()).subscribe(users => {
           this.users = users;
        });
    }


}


