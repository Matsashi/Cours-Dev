import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  articleElements: Array<any>= [];
  newArticleName: string="";
  newArticleContent: string="";
  onAddArticle(){
    this.articleElements.push({
      Name: this.newArticleName,
      Content: this.newArticleContent,
      Type: "Article"
    });
  }
  onAddBlueprint(){
    this.articleElements.push({
      Name: this.newArticleName,
      Content: this.newArticleContent,
      Type: "Blueprint"
    });
  }
}
