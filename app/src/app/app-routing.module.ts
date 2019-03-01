import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DashboardComponent }   from './dashboard/dashboard.component';
import { PostsComponent }   from './posts/posts.component';
import { PostListComponent }   from './post-list/post-list.component';
import { EditPostComponent }   from './edit-post/edit-post.component';
import { DeletePostComponent }   from './delete-post/delete-post.component';
import { CreatePostComponent }   from './create-post/create-post.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';

const routes: Routes = [
{path: '', redirectTo: '/dashboard', pathMatch: 'full' },
{ path: 'dashboard', component: DashboardComponent},
{ path: 'login' , component : LoginComponent},
{ path: 'register' , component : RegisterComponent},
{ path: 'posts' , component : PostsComponent},
{ path: 'list/:id', component : PostListComponent},
{ path: 'posts/create', component : CreatePostComponent},
{ path: 'posts/:id', component : DeletePostComponent},
{ path: 'posts/:id/edit', component : EditPostComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
