import { Component, OnInit } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute,  Router } from '@angular/router';
import { Location } from '@angular/common';
import{ UserService } from '../services/user.service';
import { AuthenticateService } from '../services/authenticate.service';
import{ PostService } from '../services/post.service';
import {User} from '../models/user';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-create-post',
  templateUrl: './create-post.component.html',
  styleUrls: ['./create-post.component.css']
})
export class CreatePostComponent implements OnInit {

private baseUrl = 'http://localhost:8000/api/posts';

   currentUser: User;
   user: User[] = [];

	 post = [];
	
  constructor(private http: HttpClient, 
  	private route: ActivatedRoute,
  	private router: Router,
    private Posts: PostService,
    private User: UserService,
    private authenticationService: AuthenticateService
   	) { }


  ngOnInit() {
     this.authenticationService.currentUser.subscribe(x => this.currentUser = x);
  }

   getUser(){
      return this.User.getUser().pipe(first()).subscribe(user => {
           this.user = user;
        });
    }
  createPost(post){
    console.log(post);
  	this.Posts.createPost(post).subscribe(data=>{ 
    this.post = data;
    this.router.navigate(['/posts']);
  });
  
  	
 
}
}
