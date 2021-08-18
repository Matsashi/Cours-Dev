import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';


import { AppComponent } from './app.component';
import { ExoRecapButtonComponent } from './exo-recap-button/exo-recap-button.component';

@NgModule({
  declarations: [
    AppComponent,
    ExoRecapButtonComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
