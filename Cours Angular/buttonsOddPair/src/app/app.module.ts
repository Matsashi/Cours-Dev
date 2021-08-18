import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { BasicSurlignDirective } from './highlight.directive';
import { BetterSurlignDirective } from './better-surlign.directive';

@NgModule({
  declarations: [
    AppComponent,
    BasicSurlignDirective,
    BetterSurlignDirective
  ],
  imports: [
    BrowserModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
