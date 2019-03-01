import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';
import{ PostService } from '../services/post.service';


@Component({
  selector: 'app-delete-post',
  templateUrl: './delete-post.component.html',
  styleUrls: ['./delete-post.component.css']
})
export class DeletePostComponent implements OnInit {

  private baseUrl = 'http://localhost:8000/api/posts/';
	post = [];

  constructor(private http:HttpClient, 
  	private route: ActivatedRoute,
  	private router: Router,
     private Posts: PostService) { }

  ngOnInit() {
  	let id = +this.route.snapshot.paramMap.get('id');
  	this.Posts.deletePost(id).subscribe(data=>{ 
    this.post = data;
    this.router.navigate(['/posts']);
  });
  
  
  }


}


