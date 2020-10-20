/* eslint-disable */
import { getComments, addComments } from './api'
import $ from 'jquery'
import {appendCommentToDOM, appendStyle} from './utils'
import {cssTemplate, getLoadMoreButton, getForm} from './templete'

export function init(options) {
    let siteKey = ''
    let apiUrl = ''
    let containerElement = ''
    let lastID = null;
    let isEnd = false;
    let commentDOM = null
    let loadMoreClassName
    let commentsClassName
    let commentsSelector
    let formClassName
    let formSelector
    siteKey = options.siteKey
    apiUrl = options.apiUrl
    loadMoreClassName = `${siteKey}-load-more`
    commentsClassName = `${siteKey}-comments`
    formClassName = `${siteKey}-add-comment-form`
    commentsSelector = '.' + commentsClassName
    formSelector = '.' + formClassName

    containerElement = $(options.containerSelector)
    containerElement.append(getForm(formClassName ,commentsClassName))
    appendStyle(cssTemplate)
    commentDOM = $(commentsSelector);
    getNewComments()
    $('.container').on('click', '.'+loadMoreClassName, () => {
        getNewComments()
    })

    $(formSelector).submit(e => {
        e.preventDefault();
        const nicknameDOM = $(`${formSelector} input[name=nickname]`)
        const contentDOM = $(`${formSelector} textarea[name=content]`)
        const newCommentdata = {
            site_key: siteKey,
            nickname: nicknameDOM.val(),
            content: contentDOM.val()
        }
        addComments(apiUrl, siteKey, newCommentdata, data => {
            if (!data.ok) {
                alert(data.message)
                return
            }
            nicknameDOM.val('')
            contentDOM.val('')
            appendCommentToDOM(commentDOM, newCommentdata, true)
        })
    })

    function getNewComments() {
        const commentDOM = $(commentsSelector);
        if (isEnd) {
            return
        }
        $('.' + loadMoreClassName).hide()
        getComments(apiUrl ,siteKey, lastID, data => {
            if(!data.ok){
                    alert(data.message)
                    return
                }
                const comments = data.message;
                for(let comment of comments) {
                    appendCommentToDOM(commentDOM, comment, false)
                }
                let length = comments.length
                if (length === 0) {
                    isEnd = true
                    $('.'+loadMoreClassName).hide()
                } else {
                    lastID = comments[length - 1].id
                    const loadMorebuttonHTML = getLoadMoreButton(loadMoreClassName)
                    $('.container').append(loadMorebuttonHTML)  
                }
        })
    }
}


