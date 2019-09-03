@extends('layout.layout_default')
@section('title','キャラクターシート')
@section('content')
    <h1>キャラクターの作成</h1>
            <h2>キャラクターの職業</h2>
            <form action="/mockup/toppage" method="post">
                <button>保存する</button>
            </form>
            <select>
                <option>職種</option>
            </select>
            <select>
                <option>職業</option>
            </select>
            <table class="ability" border="1" cellspacing="0">
                <tr>
                    <td>能力値</td>
                </tr>
                   <tr>
                   <td>基本能力</td>
                    <td>
                        <select>
                            <option>STR</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>CON</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>DEX</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>POW</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>APP</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>INT</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>EDU</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>職業追加値</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>その他追加</td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>
                    <td>
                        <input name="STR" type="number" style="width: 40px;" >
                    </td>

                </tr>
                <tr>
                    <td>合計</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
            </table>
            <br>
            <p>技能</p>
            <table border="1" cellspacing="0" class="skill">
              <tr>
                <td>成長</td>
                <td>技能名</td>
                <td>初期値</td>
                <td>職業技能</td>
                <td>趣味技能</td>
                <td>成長</td>
                <td>その他増加分</td>
              </tr>
               <tr>
                   <td><input type="checkbox"></td>
                    <td>技能名</td>
                    <td>初期値</td>
                    <td>
                        <input name="num">
                    </td>
                    <td>
                        <input name="num">
                    </td>
                    <td>
                        <input name="num">
                    </td>
                    <td>
                        <input name="num">
                    </td>
                    
                </tr>
            </table>
            <p>所持品</p>
            <table border="1" cellspacing="0">
                <tr>
                    <td>名前</td>
                    <td>個数</td>
                    <td>単価</td>
                    <td>小計</td>
                    <td>説明</td>
                    
                </tr>
                <tr>
                    <td><input></td>
                    <td><input></td>
                    <td><input></td>
                    <td><input></td>
                    <td><input></td>
                    
                </tr>
            </table>
            <p>武器</p>
            <table border="1" cellspacing="0">
                <tr>
                    <td>名前</td>
                    <td>単価</td>
                    <td>強さ</td>
                </tr>
                <tr>
                    <td><input></td>
                    <td><input></td>
                    <td><input></td>
                    
                    
                </tr>
            </table>
            <p>キャラクター情報</p>
            <table border="1" cellspacing="0">
                <tr>
                    <td>名前</td>
                    <td><input></td>
                </tr>
                <tr>
                    <td>年齢</td>
                    <td><input></td>
                </tr>
                <tr>
                    <td>性別、種族</td>
                    <td><input></td>
                </tr>
                <tr>
                    <td>細かい説明</td>
                    <td><textarea></textarea></td>
                </tr>
                <tr>
                    <td>手持ちのお金</td>
                    <td><input></td>
                </tr>
                <tr>
                    <td>貯金</td>
                    <td><input></td>
             </tr>
                <tr>
                    <td>身体の負傷</td>
                    <td><textarea></textarea></td>
                </tr>
                <tr>
                    <td>狂気の症状（不定、一時的）</td>
                    <td><textarea></textarea></td>
                </tr>
                
                
            </table>
            