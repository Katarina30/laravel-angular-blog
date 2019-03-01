import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders  } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';
import {Posts} from '../models/posts';

@Injectable({
  providedIn: 'root'
})
export class PostService {

  constructor(private http: HttpClient) { }

  private baseUrl = 'http://localhost:8000/api/posts'; 

  getPosts(){
  	return this.http.get<api[]>(this.baseUrl);
  }

  getPostById(id){
  	
  	return this.http.get<api[]>(this.baseUrl+'/'+id);
  }

  editPost(id){

  	return this.http.get<api[]>(this.baseUrl+'/'+id+'/edit');
  }

  updatePost(data,id){
  	return this.http.put<api[]>(this.baseUrl+'/'+id, data);
  }

  deletePost(id){
  	return this.http.delete<api[]>(this.baseUrl+'/'+id);
  }
  createPost(data){
  	return this.http.post<api[]>(this.baseUrl, data);
  }

}


export interface api{
  data: Posts[];
}
